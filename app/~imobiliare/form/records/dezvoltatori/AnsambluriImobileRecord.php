<?php

namespace Imobiliare\Nomenclatoare\Form;

class AnsambluriImobileRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare imobil')
            ->setCaption('update', 'Modificare imobil (#:id:)')
            ->setCaption('delete', 'Ştergere imobil (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea imobilului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea imobilului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea imobilului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea imobilului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea imobilului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea imobilului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nume', 'required')
            ->addRule('insert', 'suprafata_min', 'required')
            ->addRule('insert', 'suprafata_max', 'required')

            ->addRule('update', 'nume', 'required')
            ->addRule('update', 'suprafata_min', 'required')
            ->addRule('update', 'suprafata_max', 'required')

            ->addMessage('insert', 'nume.required', 'Denumirea imobilului trebuie completată.')
            ->addMessage('update', 'nume.required', 'Denumirea imobilului trebuie completată.') 

            ->addMessage('insert', 'suprafata_min.required', 'Suprafata minima trebuie completată.')
            ->addMessage('update', 'suprafata_min.required', 'Suprafata minima trebuie completată.') 

            ->addMessage('insert', 'suprafata_max.required', 'Suprafata maxim trebuie completată.')
            ->addMessage('update', 'suprafata_max.required', 'Suprafata maxim trebuie completată.') 
        ;
    }

    public static function create()
    {
        return self::$instance = new AnsambluriImobileRecord('ansamblu_imobile');
    }

}