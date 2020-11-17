<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perjadin extends CI_Controller
{
	public function __constuct()
	{
		parent::__constuct();
		// $this->load->model('perjadin_model');
		$this->load->library('form_validation');
		// if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		// $data['perjadin'] = $this->perjadin_model->getAll();
		$this->load->view('kasie/list_perjadin');
	}

	//masalahnya disini feb.. kamu masukin variabel product di view list_perjadin..
	//udah bener kamu load viewnya di index() 
	//tp variabel product ini belum kamu masukin ke index()
	// E YG MANA? 
	// SEBELUMNYA JG GT KOK
	// COBA LIAT YA
	// udah bisa feb, tp emang masalah di variabel product.. eblum kamu masukin di index

	//coba var product tu dapet dimana kira2
	// bentar,, itu belom kuedit emang, belom kuganti, waitt
	// lo tadi ga bisa wkwk, gamau menuju ke halaman list

	// oke wait
	// SEKARANG GIMANA BIAR AKU BISA LOAD PERJADIN SAYA, DAN JUGA LIST_PERJADIN DAN MATRIKS_PERJADIN
	// SEMUANYA DI LOAD JADI SATU DI INDEX() KAH??
	// engga.. itu semua view ya? 
	// IYA, TAPI KAN TETEP PERLU DILOAD MELALUI CONTROLLER GA SI?
	// iya betul syekali.. berarti bikin controller dan view lain..
	// OH JADI GABISA JADI SATU YAK?
	// bisa tp lebih ribet wkwk mending kalau fungsinya beda2 langsung bedain.. apalagi kalau view gbs disatuin iyak wkwk
	// OALAH OKEI, NANTI AKU BIKIN CONTROLLER BARU BRRTI YA UNTUK YG PERJADIN SAYA. TAPI... UNTUK PERKADIN PEGAWA KAN ADA DUA VIEW, ITU BIKIN DIPISAH APA BISA JADI SATU? YG LIST DAN MATRIKS TUH
	// kalau masih awal2 gini mending dipisah aja feb biar g bingung.. nanti kalau udah mulai paham gimana ngakalinnya biar makin singkat boleh dijadiin satu.. itupun kalau fungsi di tiap halaman itu dikit2.. kalau banyak mending dipisah
	// okei nanti kucoba yaa. aku skrg mau pulang wkwk
	// mantab XD fii amanillah hati2 di jalan.. aku matiin yak
	//iyaaa makasiiii

	public function add()
	{
		$perjadin = $this->perjadin_model;			//objek model Perjadin_model
		$validation = $this->form_validation;		//objek validasi
		$validation->set_rules($perjadin->rules()); //terapkan rules

		if ($validation->run()) {
			$perjadin->save(); //simpan data ke db
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		} //jika validasi lancar

		$this->load->view('kasie/perjadin/new_form');
	}

	public function edit($idPerjadin = null)
	{
		if (!isset($idPerjadin)) redirect('kasie/perjadin');

		$perjadin = $this->perjadin_model;
		$validation = $this->form_validation;
		$validation->set_rules($perjadin->rules());

		if ($validation->run()) {
			$perjadin->update();
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}

		$this->load->view('kasie/perjadin/list', $data);
	}

	public function delete($idPerjadin = null)
	{
		if (!isset($idPerjadin)) show_404();
		if ($this->perjadin_model->delete($idPerjadin)) {
			redirect(site_url('kasie/perjadin/list'));
		}
	}
}

?>

