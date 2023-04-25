<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Booking;

class BookingController extends Controller
{
    public function getToday() {
        $today = Carbon::today();

        return view('reservierung', $this->getRequestData($today, '/reservierung/morgen', 'Morgen &rarr;'));
    }

    public function getTomorrow() {
        $tomorrow = Carbon::tomorrow();

        return view('reservierung', $this->getRequestData($tomorrow, '/reservierung/heute', '&larr; Heute'));
    }

    public function getErfolg() {
        if(session('success')) {
            return view('reservierung-erfolg');
        } else {
            abort(404);
        }
    }

    public function postToday() {
        return $this->post(Carbon::today());
    }
    
    public function postTomorrow() {
        return $this->post(Carbon::tomorrow());
    }

    private function getRequestData($date, $dateButtonUrl, $dateButtonCaption) {
        $requestData = [
            'date' => $date->format('d.m.Y'),
            'date_button_url' => $dateButtonUrl,
            'date_button_caption' => $dateButtonCaption
        ];

        return $requestData + $this->getAllAvailableTimeslots($date);
    }

    private function getAllAvailableTimeslots($date) {
        if($this->isTwoTimeslotsActive($date)) {
            return [
                'available_morning' => $this->getAvailableBookings($date, 'morning'),
                'available_noon_evening' => $this->getAvailableBookings($date, 'noon_evening'),
            ];
        } else {
            return [
                'available_morning' => $this->getAvailableBookings($date, 'morning'),
                'available_noon' => $this->getAvailableBookings($date, 'noon'),
                'available_evening' => $this->getAvailableBookings($date, 'evening'),
            ];
        }
    }

    private function isTwoTimeslotsActive($date) {
        return $date->gte(Carbon::createFromFormat('!d.m.Y', '30.07.2020'));
    }

    private function getAvailableBookings($date, $timeslot) {
        return max(250 - Booking::where('date', $date->format('Y-m-d'))->where('timeslot', $timeslot)->sum('amount_of_people'), 0);
    }
    
    private function post($requestedDate) {
        $validator = Validator::make(request()->all(), $this->getRules(), $this->getMessages());
    
        $validator->after(function() use($validator, $requestedDate) {
            $errors = $validator->errors();
            
            if(!$errors->hasAny(['datum', 'zeitraum'])) {
                $date = Carbon::createFromFormat('!d.m.Y', request('datum'));
                
                if ($requestedDate->ne($date)) {
                    $errors->add('allgemein', 'Bitte versuchen Sie es erneut! Fehlercode #001');
                }

                $requestedBookings = request('anzahl');
                $availableBookings = $this->getAvailableBookings($date, request('zeitraum'));;
    
                if ($availableBookings<=0) {
                    $errors->add('zeitraum', 'Der Zeitraum ist bereits vollständig belegt!');
                    $errors->add('allgemein', 'Der Zeitraum ist bereits vollständig belegt!');
                }
                if ($requestedBookings > $availableBookings) {
                    $errors->add('anzahl', 'Die Teilnehmerzahl übersteigt Anzahl der freien Plätze: ' . $availableBookings);
                }
                
                if(!$errors->hasAny(['anzahl', 'vorname', 'nachname', 'telefon'])) {
                    $count = Booking::where('date', $date->format('Y-m-d'))
                        ->where('first_name', request('vorname'))
                        ->where('last_name', request('nachname'))
                        ->where('phone', request('telefon'))
                        ->count();
                    if($count>=1) {
                        $errors->add('allgemein', 'Mit Ihren Daten wurde heute bereits reserviert.');
                    }
                }
            }
        });
    
        $validator->validate();
    
        $this->createBooking()->save();
        
        return redirect('/reservierung/erfolg')->withInput()->with('success', true);
    }

    private function getRules() {
        return [
            'datum' => 'required|date_format:d.m.Y',
            'zeitraum' => $this->getTimeslotRules(),
            'vorname' => 'required|max:255',
            'nachname' => 'required|max:255',
            'telefon' => 'required|max:255',
            'anzahl' => 'required|integer|between:1,6',
        ];
    }

    private function getTimeslotRules() {
        if($this->isTwoTimeslotsActive(Carbon::createFromFormat('!d.m.Y', request('datum')))) {
            return 'required|in:morning,noon_evening';
        } else {
            return 'required|in:morning,noon,evening';
        }
    }

    private function getMessages() {
        return [
            'datum.required' => 'Bitte versuchen Sie es erneut! Fehlercode #002',
            'datum.date_format' => 'Bitte versuchen Sie es erneut! Fehlercode #003',
            'zeitraum.required' => 'Bitte wählen Sie einen Zeitraum aus!',
            'zeitraum.in' => 'Der gewählte Zeitraum ist ungültig!',
            'vorname.required' => 'Bitte geben Sie Ihren Vornamen ein!',
            'vorname.max' => 'Es sind maximal 255 Zeichen erlaubt!',
            'nachname.required' => 'Bitte geben Sie Ihren Nachnamen ein!',
            'nachname.max' => 'Es sind maximal 255 Zeichen erlaubt!',
            'telefon.required' => 'Bitte geben Sie Ihre Telefonnummer ein!',
            'telefon.max' => 'Es sind maximal 255 Zeichen erlaubt!',
            'anzahl.required' => 'Bitte geben Sie die Anzahl der Teilnehmer ein!',
            'anzahl.integer' => 'Es sind nur ganze Zahlen erlaubt!',
            'anzahl.between' => 'Es sind nur Zahlen zwischen 1 und 6 erlaubt!',
        ];
    }

    private function createBooking() {
        $booking = new Booking;

        $booking->date = Carbon::createFromFormat('!d.m.Y', request('datum'))->format('Y-m-d');
        $booking->timeslot = request('zeitraum');
        $booking->first_name = request('vorname');
        $booking->last_name = request('nachname');
        $booking->phone = request('telefon');
        $booking->amount_of_people = request('anzahl');

        return $booking;
    }

}
