<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Message::create([
            "sender_id" => 1,
            "receiver_id" => 2,
            "text" => "សូមទំនាក់ទំនាក់សម្រាប់ប្រាប់បន្ទះអនុញ្ញាតអ"
        ]);
        Message::create([
            "sender_id" => 1,
            "receiver_id" => 3,
            "text" => " Hello World"
        ]);
        Message::create([
            "sender_id" => 2,
            "receiver_id" => 1,
            "text" => "អ្នុញ្ញាតអនុញ្ញាតអោយប្រាប់បន្ទះទំនា"
        ]);
        Message::create([
            "sender_id" => 1,
            "receiver_id" => 2,
            "text" => "tos tv khmer text"
        ]);
    }
}
