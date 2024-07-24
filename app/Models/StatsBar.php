<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatsBar extends Model
{
    use HasFactory;

    public static function getActiveMentors()
    {
        return cache()->remember('active_mentors_30', now()->addMinutes(10), function () {
            return Http::get('https://tmm.io/api/stats/mentors/active')['days']['30'];
        });
    }

    public static function getNewMentors30Days()
    {
        return cache()->remember('new_mentors_30', now()->addMinutes(60), function () {
            return Http::get('https://tmm.io/api/stats/mentors/new/'.Carbon::now()->subDays(30)->format('Y-m-d').'/'.Carbon::now()->format('Y-m-d').'/?tz=America/Winnipeg')['count'];
        });
    }

    public static function getApplicants90Days()
    {
        return cache()->remember('applicants_90', now()->addMinutes(60), function () {
            return Http::get('https://tmm.io/api/stats/accounts/pending-approval/'.Carbon::now()->subDays(30)->format('Y-m-d').'/'.Carbon::now()->format('Y-m-d').'/?tz=America/Winnipeg')['count'];
        });
    }

    public static function uniqueConversationsToday()
    {
        return cache()->remember('unique_conversations_today', now()->addMinutes(2), function () {
            return Http::get('https://tmm.io/api/stats/mentees/unique/'.Carbon::now()->format('Y-m-d').'/'.Carbon::now()->format('Y-m-d').'/?tz=America/Winnipeg')['count'];
        });
    }

    public static function uniqueConversationsLast30Days()
    {
        return cache()->remember('unique_conversations_last_30', now()->addMinutes(60), function () {
            return Http::get('https://tmm.io/api/stats/mentees/unique/'.Carbon::now()->subDays(30)->format('Y-m-d').'/'.Carbon::now()->format('Y-m-d').'/?tz=America/Winnipeg')['count'];
        });
    }

    public static function uniqueConversationsLast365Days()
    {
        return cache()->remember('unique_conversations_last_365', now()->addMinutes(60), function () {
            return Http::get('https://tmm.io/api/stats/mentees/unique/'.Carbon::now()->subDays(365)->format('Y-m-d').'/'.Carbon::now()->format('Y-m-d').'/?tz=America/Winnipeg')['count'];
        });
    }

    public static function uniqueConversationsThisYear()
    {
        return cache()->remember('unique_conversations_this_year', now()->addMinutes(60), function () {
            return Http::get('https://tmm.io/api/stats/mentees/unique/'.Carbon::now()->startOfYear()->format('Y-m-d').'/'.Carbon::now()->format('Y-m-d').'/?tz=America/Winnipeg')['count'];
        });
    }

    public static function messagesWaiting()
    {
        return cache()->remember('messages_waiting', now()->addMinutes(2), function () {
            return Http::get('https://tmm.io/api/stats/messages/undelivered/?tz=America/Winnipeg')['count'];
        });
    }
}
