<?php
// resources/views/components/demo/⚡counter.blade.php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public string $name = 'Livewire Counter';

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count = max(0, $this->count - 1);
    }

    public function bariyeDao()
    {
        $this->count += 10;
    }

    public function changeName()
    {
        $this->name = 'নাম পরিবর্তিত হয়েছে! '.now()->format('H:i:s');
    }

    // wire:click = Server-side PHP method call
};
?>

<div style="max-width:560px;margin:32px auto;font-family:system-ui;padding:16px;border:1px solid #eee;border-radius:12px;">
    <h2 style="margin:0 0 8px;">লাইভওয়্যার কাউন্টার ⚡</h2>

    <p style="font-size:18px;margin:0 0 16px;">
        Count: <strong style="font-size:22px;">{{ $count }}</strong>
    </p>

    {{ $name }}
    <br>

    <button type="button" wire:click="increment">+ বাড়াও</button>
    <button type="button" wire:click="decrement" style="margin-left:8px;">- কমাও</button>

    <button type="button" wire:click="bariyeDao" style="margin-left:8px;">+10 বাড়াও</button>

    <button type="button" wire:click="changeName" style="margin-left:8px;">নাম পরিবর্তন করো</button>

    <p style="opacity:.7;margin-top:16px;">
        মজা: এটা সেই কাউন্টার—যেটা “বসে আছে” তবুও কাজ করে। 😄
    </p>
</div>
