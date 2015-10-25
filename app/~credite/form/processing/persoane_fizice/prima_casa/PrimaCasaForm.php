<?php

namespace Credite\PersoaneFizice\Form;

class PrimaCasaForm extends \Processing\Form\Form
{

    /**
     * @return PrimaCasaForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
	{
//      apelez constructorul din Form
/*      $this->controls = new Collection();
        $this->addControls();
        $this->setView();
        $this->setModel();
        $this->setProperties(); */
		return self::$instance = new PrimaCasaForm();
	}

	protected function setView()
	{
		$this->view('persoane_fizice.prima_casa.form');	
	}

	protected function setModel()
	{
		$this->model('Credite|PersoaneFizice');
	}

	protected function addControls()
	{
		// denumire_tip
		$this
		// 0
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('nume')
			->caption('<b>Nume persoană fizică</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		) 
		// 1
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('prenume')
			->caption('<b>Prenume persoană fizică</b>') 
			->class('form-control  data-source')
			//->placeholder('Prenume')
			->controlsource('prenume')
			->controltype('textbox')
			->maxlength(255)
		)
		// 2
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('cnp')
			->caption('<b>Cod Numeric Personal</b>') 
			->class('form-control  data-source')
			//->placeholder('CNP')
			->controlsource('cnp')
			->controltype('textbox')
			->maxlength(255)
		)
		// 3
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('e-mail')
			->caption('<b>E-mail</b>') 
			->class('form-control  data-source')
			//->placeholder('E-mail')
			->controlsource('e-mail')
			->controltype('textbox')
			->maxlength(255)
		)
		// 4
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('telefon')
			->caption('<b>Telefon</b>') 
			->class('form-control  data-source')
			//->placeholder('Telefon')
			->controlsource('telefon')
			->controltype('textbox')
			->maxlength(255)
		)
		// 5
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('nume_mama')
			->caption('<b>Numele mamei înainte de căsătorie</b>') 
			->class('form-control  data-source')
			//->placeholder('Numele mamei')
			->controlsource('nume_mama')
			->controltype('textbox')
			->maxlength(255)
		)
		// 6
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('salariu_net')
			->caption('<b>Salariu net</b>') 
			->class('form-control  data-source')
			//->placeholder('Numele mamei')
			->controlsource('salariu_net')
			->controltype('textbox')
			->maxlength(255)
		) 
		// 7
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('salariu')->placeholder('Textbox')
				->value('Salariu')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('salariu', '1', false,
						['class' => 'data-source icheck', 'id' => 'salariu',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'salariu',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 8
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('diurne')->placeholder('Textbox')
				->value('Diurne')->class('form-control input_label')->enabled(0)
				->addon([ 
					'before' => \Form::checkbox('diurne', '1', false,
						['class' => 'data-source icheck', 'id' => 'diurne',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'diurne',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 9
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('pensie')->placeholder('Textbox')
				->value('Pensie')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('pensie', '1', false,
						['class' => 'data-source icheck', 'id' => 'pensie',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'pensie',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 10
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('dividende')->placeholder('Textbox')
				->value('Dividende')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('dividende', '1', false,
						['class' => 'data-source icheck', 'id' => 'dividende',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'dividende',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 11
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('indemniz_copil')->placeholder('Textbox')
				->value('Îndemnizație de creștere copil')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('indemniz_copil', '1', false,
						['class' => 'data-source icheck', 'id' => 'indemniz_copil',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'indemniz_copil',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 12
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('activitati_indep')->placeholder('Textbox')
				->value('Activități independente')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('activitati_indep', '1', false,
						['class' => 'data-source icheck', 'id' => 'activitati_indep',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'activitati_indep',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 13
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('profesii_liberale')->placeholder('Textbox')
				->value('Profesii liberale')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('profesii_liberale', '1', false,
						['class' => 'data-source icheck', 'id' => 'profesii_liberale',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'profesii_liberale',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 14
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('drepturi_de_autor')->placeholder('Textbox')
				->value('Drepturi de autor')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('drepturi_de_autor', '1', false,
						['class' => 'data-source icheck', 'id' => 'drepturi_de_autor',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'drepturi_de_autor',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 15
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('chirii')->placeholder('Textbox')
				->value('Chirii')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('chirii', '1', false,
						['class' => 'data-source icheck', 'id' => 'chirii',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'chirii',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 16
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('rente_viagere')->placeholder('Textbox')
				->value('Rente viagere')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('rente_viagere', '1', false,
						['class' => 'data-source icheck', 'id' => 'rente_viagere',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'rente_viagere',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 17
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('comisioane')->placeholder('Textbox')
				->value('Comisioane')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('comisioane', '1', false,
						['class' => 'data-source icheck', 'id' => 'comisioane',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'comisioane',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 18
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('ore_suplimentare')->placeholder('Textbox')
				->value('Ore suplimentare')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('ore_suplimentare', '1', false,
						['class' => 'data-source icheck', 'id' => 'ore_suplimentare',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'ore_suplimentare',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 19
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('contracte_de_management')->placeholder('Textbox')
				->value('Contracte de management')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('contracte_de_managementcontracte_de_management', '1', false,
						['class' => 'data-source icheck', 'id' => 'contracte_de_management',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'contracte_de_management',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 20
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('contracte_de_mandat')->placeholder('Textbox')
				->value('Contracte de mandat')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('contracte_de_mandat', '1', false,
						['class' => 'data-source icheck', 'id' => 'contracte_de_mandat',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'contracte_de_mandat',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 21
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('norma_de_hrana')->placeholder('Textbox')
				->value('Norma de hrană')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('norma_de_hrana', '1', false,
						['class' => 'data-source icheck', 'id' => 'norma_de_hrana',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'norma_de_hrana',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 22
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('bonuri_de_masa')
			->caption('<b>Bonuri de masă</b>') 
			->class('form-control  data-source')
			//->placeholder('Bonuri de masa')
			->controlsource('bonuri_de_masa')
			->controltype('textbox')
			->maxlength(255)
		) 
		// 23
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('no_bonuri_de_masa')->placeholder('Textbox')
				->value('Nu este cazul cu bonuri de masă')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('no_bonuri_de_masa', '1', false,
						['class' => 'data-source icheck', 'id' => 'no_bonuri_de_masa',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'no_bonuri_de_masa',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 24
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('per_contract')
				->caption('<b>Perioada contractului</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('per_contract')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getPerioada())
		)
		// 25
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('alte_venituri')
			->caption('<b>Alte venituri</b>') 
			->class('form-control  data-source')
			//->placeholder('Bonuri de masa')
			->controlsource('alte_venituri')
			->controltype('textbox')
			->maxlength(255)
		)
		// 26
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('per_alte_ven')
				->caption('<b>Perioada altor venituri</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('per_alte_ven')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getPerioada())
		)
		// 27
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_salar')->placeholder('Textbox')
				->value('Salariu')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_salar', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_salar',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_salar',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 28
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_diurne')->placeholder('Textbox')
				->value('Diurne')->class('form-control input_label')->enabled(0)
				->addon([ 
					'before' => \Form::checkbox('alt_ven_diurne', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_diurne',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_diurne',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 29
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_pensie')->placeholder('Textbox')
				->value('Pensie')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_pensie', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_pensie',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_pensie',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 30
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_divid')->placeholder('Textbox')
				->value('Dividende')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_divid', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_divid',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_divid',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 31
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_indemn_copil')->placeholder('Textbox')
				->value('Îndemnizație de creștere copil')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_indemn_copil', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_indemn_copil',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_indemn_copil',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 32
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_activ_indep')->placeholder('Textbox')
				->value('Activități independente')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_activ_indep', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_activ_indep',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_activ_indep',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 33
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_prfs_lbrl')->placeholder('Textbox')
				->value('Profesii liberale')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_prfs_lbrl', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_prfs_lbrl',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_prfs_lbrl',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 34
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_drept_de_autor')->placeholder('Textbox')
				->value('Drepturi de autor')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_drept_de_autor', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_drept_de_autor',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_drept_de_autor',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 35
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_chirii')->placeholder('Textbox')
				->value('Chirii')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_chirii', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_chirii',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_chirii',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 36
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_rente_viagere')->placeholder('Textbox')
				->value('Rente viagere')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_rente_viagere', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_rente_viagere',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_rente_viagere',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 37
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_cmsne')->placeholder('Textbox')
				->value('Comisioane')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_cmsne', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_cmsne',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_cmsne',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 38
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_ore_suplim')->placeholder('Textbox')
				->value('Ore suplimentare')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_ore_suplim', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_ore_suplim',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_ore_suplim',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 39
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_cntrct_de_mngmnt')->placeholder('Textbox')
				->value('Contracte de management')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('contracte_de_managementcontracte_de_management', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_cntrct_de_mngmnt',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_cntrct_de_mngmnt',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 40
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_cntrct_de_mandat')->placeholder('Textbox')
				->value('Contracte de mandat')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_cntrct_de_mandat', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_cntrct_de_mandat',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_cntrct_de_mandat',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 41
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('alt_ven_nrm_de_hrana')->placeholder('Textbox')
				->value('Normă de hrană')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('alt_ven_nrm_de_hrana', '1', false,
						['class' => 'data-source icheck', 'id' => 'alt_ven_nrm_de_hrana',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'alt_ven_nrm_de_hrana',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 42
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('tot_ven_net')
			->caption('<b>Total venit net</b>') 
			->class('form-control  data-source')
			//->placeholder('Bonuri de masa')
			->controlsource('tot_ven_net')
			->controltype('textbox')
			->maxlength(255)
		)
		// 43
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denum_angajator')
			->caption('<b>Denumire angajator</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('denum_angajator')
			->controltype('textbox')
			->maxlength(255)
		)
		// 44
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('tip_angajator')
				->caption('<b>Tip angajator</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('tip_angajator')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getTipAngajator())
		)
		// 45
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('cui')
			->caption('<b>CUI</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('cui')
			->controltype('textbox')
			->maxlength(255)
		)
		// 46
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('nr_angajati')
				->caption('<b>Număr de angajați</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('nr_angajati')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getNrAngajati())
		)
		// 47
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('dom_de_actvte')
			->caption('<b>Domeniu de activitate</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('dom_de_actvte')
			->controltype('textbox')
			->maxlength(255)
		)
		// 48
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('ultim_stud_abs')
				->caption('<b>Ultimele studii absolvite</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('ultim_stud_abs')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getUltimStudii())
		)
		// 49
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('st_civila')
				->caption('<b>Stare civilă</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('st_civila')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getStareCivila())
		)
		// 50
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('functie')
			->caption('<b>Funcție</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('functie')
			->controltype('textbox')
			->maxlength(255)
		)
		// 51
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('profesie')
			->caption('<b>Profesie</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('profesie')
			->controltype('textbox')
			->maxlength(255)
		)
		//52
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('nr_membri_fam')
			->caption('<b>Număr membri familie</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('nr_membri_fam')
			->controltype('textbox')
			->maxlength(255)
		)
		// 53
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('pers_intrtnr')
			->caption('<b>Persoane în întreținere</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('pers_intrtnr')
			->controltype('textbox')
			->maxlength(255)
		)
		// 54
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('propr_auto')->placeholder('Textbox')
				->value('Proprietar autoturism')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('propr_auto', '1', false,
						['class' => 'data-source icheck', 'id' => 'propr_auto',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'propr_auto',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 55
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('sit_locativa')
				->caption('<b>Situație locativă</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('sit_locativa')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getSitLocativa())
		)
		// 56
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('vec_adr_curenta')
			->caption('<b>Vechime la adresa curentă</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('vec_adr_curenta')
			->controltype('textbox')
			->maxlength(255)
		)
		// 57
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('vec_loc_munca')
			->caption('<b>Vechime la locul de muncă actual/anterior</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('vec_loc_munca')
			->controltype('textbox')
			->maxlength(255)
		)
		// 58
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('vec_tot_munca')
			->caption('<b>Vechime totală în muncă</b>') 
			->class('form-control  data-source')
			//->placeholder('Nume')
			->controlsource('vec_tot_munca')
			->controltype('textbox')
			->maxlength(255)
		)
		// 59
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('bnc_virare_salar')
				->caption('<b>Banca unde se virează salariul</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('bnc_virare_salar')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getBanca())
		)
		// 60
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('istoric_credit')->placeholder('Textbox')
				->value('Istoric creditare')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('istoric_credit', '1', false,
						['class' => 'data-source icheck', 'id' => 'istoric_credit',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'istoric_credit',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 61
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('tip_client')
				->caption('<b>Tip client</b>')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('tip_client')
				->controltype('combobox')
				->enabled('false')
				->options(\Credite\PersoaneFizice::getTipClient())
		)
		; 

	}
}