<?php

namespace App\Console\Commands;

use App\Mail\EventMail;
use App\Mail\ReminderMail;
use App\Mail\TaskMail;
use App\Models\Event;
use App\Models\Reminder;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->events();
        $this->reminder();
        $this->task();
        Mail::to('ibraheem.alaoor@hotmail.com')->send(new TaskMail(Task::first()));
    }

    public function events()
    {
        $eventsUnsentEmails = Event::query()
            ->where('start_date',Carbon::tomorrow())
            ->whereNull('last_email_sent')
            ->get();

        foreach($eventsUnsentEmails as $event)
        {
            Mail::to($event->user->email)->send(new EventMail($event));
            $event->update(['last_email_sent' => now()]);
        }

        $eventsRepeatEmails = Event::query()
            ->whereNotNull('last_email_sent')
            ->whereNotNull('repeat_id')
            ->get();

        foreach ($eventsRepeatEmails as $event){
            $interval = $event->repeat->interval;
            switch ($interval) {
                case 1:
                    if (!$event->last_email_sent->isToday()) {
                        Mail::to($event->user->email)->send(new EventMail($event));
                        $event->update(['last_email_sent' => now()]);
                    }
                    break;
                case 5:
                    if ($event->last_email_sent->addDay()->isWeekday()) {
                        if(!$event->last_email_sent->isToday()){
                            Mail::to($event->user->email)->send(new EventMail($event));
                            $event->update(['last_email_sent' => now()]);
                        }
                    }
                    break;
                case 7:
                    if ($event->last_email_sent->addWeek()->isToday()) {
                        Mail::to($event->user->email)->send(new EventMail($event));
                        $event->update(['last_email_sent' => now()]);
                    }
                    break;
                case 30:
                    if ($event->last_email_sent->addMonth()->isToday()) {
                        Mail::to($event->user->email)->send(new EventMail($event));
                        $event->update(['last_email_sent' => now()]);
                    }
                    break;
                case 365:
                    if ($event->last_email_sent->addYear()->isToday()) {
                        Mail::to($event->user->email)->send(new EventMail($event));
                        $event->update(['last_email_sent' => now()]);
                    }
                    break;
                default:
                    dd('nothing to send');
            }
        }
    }

    public function reminder()
    {
        $reminderUnsentEmails = Reminder::query()
            ->where('date',Carbon::tomorrow())
            ->whereNull('last_email_sent')
            ->whereNull('is_done')
            ->get();

        foreach($reminderUnsentEmails as $reminder)
        {
            Mail::to($reminder->user->email)->send(new ReminderMail($reminder));
            $reminder->update(['last_email_sent' => now()]);
        }

        $reminderRepeatEmails = Reminder::query()
            ->whereNotNull('repeat_id')
            ->whereNotNull('last_email_sent')
            ->whereNull('is_done')
            ->get();

        foreach ($reminderRepeatEmails as $key => $reminder){
            $interval = $reminder->repeat->interval;
            switch ($interval) {
                case 1:
                    if (!$reminder->last_email_sent->isToday()) {
                        Mail::to($reminder->user->email)->send(new ReminderMail($reminder));
                        $reminder->update(['last_email_sent' => now()]);
                    }
                    break;
                case 5:
                    if ($reminder->last_email_sent->addDay()->isWeekday()) {
                        if(!$reminder->last_email_sent->isToday()){
                            Mail::to($reminder->user->email)->send(new ReminderMail($reminder));
                            $reminder->update(['last_email_sent' => now()]);
                        }
                    }
                    break;
                case 7:
                    if ($reminder->last_email_sent->addWeek()->isToday()) {
                        Mail::to($reminder->user->email)->send(new ReminderMail($reminder));
                        $reminder->update(['last_email_sent' => now()]);
                    }
                    break;
                case 30:
                    if ($reminder->last_email_sent->addMonth()->isToday()) {
                        Mail::to($reminder->user->email)->send(new ReminderMail($reminder));
                        $reminder->update(['last_email_sent' => now()]);
                    }
                    break;
                case 365:
                    if ($reminder->last_email_sent->addYear()->isToday()) {
                        Mail::to($reminder->user->email)->send(new ReminderMail($reminder));
                        $reminder->update(['last_email_sent' => now()]);
                    }
                    break;
                default:
                    dd('nothing to send');
            }
        } //.reminders repeat email
    }

    public function task()
    {
        $taskUnsentEmails = Task::query()
            ->where('date',Carbon::tomorrow())
            ->whereNull('last_email_sent')
            ->whereNull('is_done')
            ->get();

        foreach($taskUnsentEmails as $task)
        {
            Mail::to($task->user->email)->send(new TaskMail($task));
            $task->update(['last_email_sent' => now()]);
        }

        $taskRepeatEmails = Reminder::query()
            ->whereNotNull('repeat_id')
            ->whereNotNull('last_email_sent')
            ->whereNull('is_done')
            ->get();

        foreach ($taskRepeatEmails as $key => $task){
            $interval = $task->repeat->interval;
            switch ($interval) {
                case 1:
                    if (!$task->last_email_sent->isToday()) {
                        Mail::to($task->user->email)->send(new TaskMail($task));
                        $task->update(['last_email_sent' => now()]);
                    }
                    break;
                case 5:
                    if ($task->last_email_sent->addDay()->isWeekday()) {
                        if(!$task->last_email_sent->isToday()){
                            Mail::to($task->user->email)->send(new TaskMail($task));
                            $task->update(['last_email_sent' => now()]);
                        }
                    }
                    break;
                case 7:
                    if ($task->last_email_sent->addWeek()->isToday()) {
                        Mail::to($task->user->email)->send(new TaskMail($task));
                        $task->update(['last_email_sent' => now()]);
                    }
                    break;
                case 30:
                    if ($task->last_email_sent->addMonth()->isToday()) {
                        Mail::to($task->user->email)->send(new TaskMail($task));
                        $task->update(['last_email_sent' => now()]);
                    }
                    break;
                case 365:
                    if ($task->last_email_sent->addYear()->isToday()) {
                        Mail::to($task->user->email)->send(new TaskMail($task));
                        $task->update(['last_email_sent' => now()]);
                    }
                    break;
                default:
                    dd('nothing to send');
            }
        } //.task repeat email
    }
}
