<?php
// resources/views/components/demo/⚡mirror.blade.php

use Livewire\Component;

new class extends Component
{
    public string $name = '';
};
?>

<div style="max-width:560px;margin:32px auto;font-family:system-ui;padding:16px;border:1px solid #eee;border-radius:12px;">
    <h2 style="margin:0 0 8px;">সত্যবাদী আয়না 🪞</h2>

    <input
        type="text"
        wire:model.live.debounce.300ms="name"
        placeholder="তোমার নাম লিখো..."
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:10px;" />

    <p style="margin-top:14px;font-size:18px;">
        আয়না বলছে: <strong>{{ $name !== '' ? $name : 'অচেনা নায়ক/নায়িকা' }}</strong>
    </p>

    <p style="opacity:.7;margin-top:10px;">
        মজা: এখানে JavaScript লেখিনি—তবুও টাইপ করলেই UI বদলাচ্ছে। ⚡
    </p>
</div>
