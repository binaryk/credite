<a class="text-black" href="{{URL::route('download-apartament-document', ['document_id' => $record->id])}}"><i class="fa fa-download"></i> <span>{{  basename($record->file_name)  }}</span></a>