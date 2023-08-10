<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Attachment extends Component
{
    use WithFileUploads;

    public $item;
    public $itemId;
    public $headers;

    public function render()
    {

        switch (request('item')) {
            case 'requirement':
                $this->headers = [
                    'title' => 'Add Attachment',
                    'subtitle' => 'Add Attachment to Requirement Item'
                ];
                break;

            default:
                # code...
                break;
        }

        // dd(request('item'));

        return view('attachment.form');
    }
}
