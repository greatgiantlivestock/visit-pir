<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class rekap_salesman_mobile extends CI_Controller {
	public function index() {
		$id = $this->input->post('id');
		$d['judul'] = "Rekap Kunjungan";
		$d['tipe'] = "edit";
		$d['q_rekap_biaya'] = $this->App_model->get_rekap_salesman_mobile();
		$d['nama_wilayah'] = $this->input->post("nama_wilayah");
		$d['nama_karyawan'] = $this->input->post("nama_karyawan");
		$d['color'] = 'style="background:#ffffe1;"';
		$d['btn_name'] = "Lihat Report";
		$d['disable'] = '';
		$d['btn_nota'] = '<button class="btn btn-xs btn-primary"><i class="fa fa-search"> </i> Lihat Report</button>';
		$d['btn_detail'] = '<button class="btn btn-xs btn-primary"> Lampiran Gambar</button>';

		$this->load->view('top_mobile',$d);
		$this->load->view('menu');
		$this->load->view('rekap_salesman/rekap_salesman_table_mobile');
		$this->load->view('bottom');
	}
	function ambil_data(){
		$productID =  $this->uri->segment(3);
		$d['judul'] = "Rekap Kunjungan";
		$d['tipe'] = "edit";
		$d['q_rekap_biaya'] = $this->App_model->get_rekap_salesman_mobile($productID);
		$d['nama_wilayah'] = $this->input->post("nama_wilayah");
		$d['nama_karyawan'] = $this->input->post("nama_karyawan");
		$d['color'] = 'style="background:#ffffe1;"';
		$d['btn_name'] = "Lihat Report";
		$d['disable'] = '';
		$d['btn_nota'] = '<button class="btn btn-xs btn-primary"><i class="fa fa-search"> </i> Lihat Report</button>';
		$d['btn_detail'] = '<button class="btn btn-xs btn-primary"> Lampiran Gambar</button>';

		$this->load->view('top_mobile',$d);
		$this->load->view('menu');
		$this->load->view('rekap_salesman/rekap_salesman_table_mobile');
		$this->load->view('bottom');
	}
}
