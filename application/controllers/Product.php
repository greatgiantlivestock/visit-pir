<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Product extends CI_Controller {

	public function index() {

		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {

			$d['master_product'] = $this->App_model->get_master_product();

			$d['judul'] = 'Master Product';		

			$d['tipe'] = "add";		

			$d['combo_satuan'] = $this->App_model->get_combo_satuan();

			$d['combo_plant_group'] = $this->App_model->get_combo_plant_group();

			$this->load->view('top',$d);

			$this->load->view('menu');

			$this->load->view('product/product_tabel.php');

			$this->load->view('bottom');

		}

		else {

			redirect("login");

		}

	}



	public function add() {

		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {

			$d['judul'] = 'Tambah Master Product';

			$d['tipe'] = 'add';	

			$d['id_product'] = '';		

			$d['kode_product'] = '';

			$d['nama_product'] = '';

			$d['combo_satuan'] = $this->App_model->get_combo_satuan();

			$d['combo_plant_group'] = $this->App_model->get_combo_plant_group();

			$d['konversi_satuan'] = '';

			$d['no_barcode'] = '';

			$this->load->view('top',$d);	

			$this->load->view('menu');

			$this->load->view('product/product_input');

			$this->load->view('bottom');

		}

		else {

			redirect("login");

		}

	}



	public function edit($id) {

		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {

			$d['judul'] = 'Edit Master Product';			

			$d['tipe'] = 'edit';

			$where['id_product'] = $id;

			$get_id = $this->db->get_where("mst_product",$where)->row();	

			$d['id_product'] = $get_id->id_product;

			$d['kode_product'] = $get_id->kode_product;

			$d['nama_product'] = $get_id->nama_product;

			$d['combo_satuan'] = $this->App_model->get_combo_satuan($get_id->id_satuan);

			$d['combo_plant_group'] = $this->App_model->get_combo_plant_group($get_id->id_plant_group);

			$d['konversi_satuan'] =  $get_id->konversi_satuan;

			$d['no_barcode'] = $get_id->no_barcode;

			$this->load->view('top',$d);

			$this->load->view('menu');

			$this->load->view('product/product_input');

			$this->load->view('bottom');			

		} else {

			redirect("login");

		}

	}





	public function save() {

		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {

			$required = array('kode_product','nama_product','id_satuan');

			$error = false;

			foreach($required as $field) {

				if(empty($_POST[$field])) {

					$error = true;

				}

			}

			$tipe = $this->input->post("tipe");	

			$where['id_product'] = $this->input->post('id_product');



			$in['kode_product'] 	= strtoupper($this->input->post('kode_product'));

			$in['nama_product'] 	= $this->input->post('nama_product');

			$in['id_satuan'] 		= $this->input->post('id_satuan');

			$in['id_plant_group'] 		= $this->input->post('id_plant_group');



			$kode_product = $this->input->post('kode_product');

			$id_product = $this->input->post('id_product');

			$cek_kode 	= $this->db->query("SELECT kode_product FROM mst_product WHERE kode_product = '$kode_product' AND id_product != '$id_product'");



			if($tipe == "add") {	

				if($cek_kode->num_rows() > 0) {

					$this->session->set_flashdata("error","Kode product Sudah Digunakan, Silahkan Coba Kode product Lain");

					redirect("Product");	

				}else if($error) {

					$this->session->set_flashdata("error","Inputan Tidak Boleh Kosong");

					redirect("Product");	

				} else {

					$this->db->insert("mst_product",$in);

					$this->session->set_flashdata("success","Input Master Product Berhasil");

					redirect("Product");

				}

			} else if($tipe == 'edit') {

				if($error) {

					$this->session->set_flashdata("error","Inputan tidak boleh kosong");

					redirect("Product/edit/".$this->input->post('id_product'));	

				} else {

					$this->db->update("mst_product",$in,$where);



					$this->session->set_flashdata("success","Edit Master Product Berhasil");

					redirect("Product");

				}		

			} else {

				$this->session->set_flashdata("success","Gagal");

				redirect("Product");

			}

		} else {

			redirect("login");

		}

	}



	public function hapus() {

		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {

			$id=$this->input->post('id_product');

			$this->db->delete("mst_product",array('id_product' => $id));			

			$this->session->set_flashdata("success","Hapus Master Product Berhasil");

			redirect("Product");			

		} else {

			redirect("login");

		}

	}





}

