<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}

	function registerNow()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('nip', 'NIP', 'required');
			$this->form_validation->set_rules('nama', 'Full Name', 'required');
			$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('tanggalAktifJabatan', 'Tanggal Aktif', 'required');
			$this->form_validation->set_rules('tanggalMasuk', 'Tanggal Masuk', 'required');
			$this->form_validation->set_rules('statusKaryawan', 'Status Karyawan', 'required');
			$this->form_validation->set_rules('roles', 'roles harus ada', 'required');

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$nip = $this->input->post('nip');
				$nama = $this->input->post('nama');
				$jenisKelamin = $this->input->post('jenisKelamin');
				$jabatan = $this->input->post('jabatan');
				$tanggalAktifJabatan = $this->input->post('tanggalAktifJabatan');
				$tanggalMasuk = $this->input->post('tanggalMasuk');
				$statusKaryawan = $this->input->post('statusKaryawan');
				$roles = $this->input->post('roles');

				$data = array(
					'username' => $username,
					'email' => $email,
					'password' => sha1($password),
					'nip' => $nip,
					'nama' => $nama,
					'jenisKelamin' => $jenisKelamin,
					'jabatan' => $jabatan,
					'tanggalAktifJabatan' => $tanggalAktifJabatan,
					'tanggalMasuk' => $tanggalMasuk,
					'statusKaryawan' => $statusKaryawan,
					'roles' => $roles

				);


				$this->load->model('user_model');
				$this->user_model->insertuser($data);
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				redirect(base_url('welcome/index'));
			}
		}
	}

	function detail($nip = null)
	{
		if (!$nip) {
			$this->session->set_flashdata('error', 'Invalid request.');
			redirect(base_url('welcome/dashboard'));
			return;
		}

		$this->load->model('user_model');
		$data['jobhistory'] = $this->user_model->getEmployeeJobHistory($nip);

		if (empty($data['jobhistory'])) {
			$this->session->set_flashdata('error', 'No job history found.');
			redirect(base_url('welcome/dashboard'));
			return;
		}

		$this->load->view('detail', $data);
	}

	function jobHistory($nip)
	{
		$this->load->model('user_model');

		$data['job_history'] = $this->user_model->getEmployeeJobHistory($nip);
		$this->load->view('job_history', $data);
	}


	function login()
	{
		$this->load->view('login');
	}

	function loginnow()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');  // Change from email to username
				$password = $this->input->post('password');
				$password = sha1($password);

				$this->load->model('user_model');
				$status = $this->user_model->checkPassword($password, $username);  // Change from email to username
				if ($status != false) {
					$username = $status->username;
					$email = $status->email;
					$role = $status->roles;

					$session_data = array(
						'username' => $username,
						'email' => $email,
						'roles' => $role,
					);

					$this->session->set_userdata('UserLoginSession', $session_data);

					if ($role == 'admin') {
						redirect(base_url('welcome/dashboard'));
					} elseif ($role == 'user') {
						redirect(base_url('welcome/dashboarduser'));
					} else {
						$this->session->set_flashdata('error', 'Invalid Role Assigned');
						redirect(base_url('welcome/login'));
					}
				}
			} else {
				$this->session->set_flashdata('error', 'Fill all the required fields');
				redirect(base_url('welcome/login'));
			}
		}
	}
	function dashboard()
	{
		// $this->load->view('dashboard');
		$this->load->model('user_model');

		$total_active_users = $this->user_model->getTotalActiveUsers();
		$this->load->view('dashboard', ['total_active_users' => $total_active_users]);
	}
	public function list()
	{
		if (!$this->session->userdata('UserLoginSession')) {
			redirect(base_url('welcome/login'));
			return;
		}

		$udata = $this->session->userdata('UserLoginSession');
		$role = isset($udata['roles']) ? $udata['roles'] : '';

		if ($role === 'admin') {
			$this->load->model('user_model');
			$data['employees'] = $this->user_model->getEmployeeReport();
			$this->load->view('list', $data);
		} else {
			$this->session->set_flashdata('error', 'You do not have permission to access this page.');
			redirect(base_url('welcome/dashboard'));
		}
	}
	function edit($nip = null)
	{
		if (!$nip) {
			$this->session->set_flashdata('error', 'Invalid request.');
			redirect(base_url('welcome/dashboard'));
			return;
		}

		$this->load->model('user_model');
		$data['user'] = $this->user_model->getUserByNIP($nip);

		if (!$data['user']) {
			$this->session->set_flashdata('error', 'User not found.');
			redirect(base_url('welcome/dashboard'));
			return;
		}

		$this->load->view('edit', $data);
	}


	function updateUser()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$jenisKelamin = $this->input->post('jenisKelamin');
			$jabatan = $this->input->post('jabatan');
			$tanggalAktifJabatan = $this->input->post('tanggalAktifJabatan');
			$tanggalMasuk = $this->input->post('tanggalMasuk');
			$statusKaryawan = $this->input->post('statusKaryawan');
			$roles = $this->input->post('roles');
			// Save Jabatan
			$this->load->model('user_model');
			$currentJabatan = $this->user_model->getCurrentJabatan($nip);

			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $password ? sha1($password) : $user->password,
				'nama' => $nama,
				'jenisKelamin' => $jenisKelamin,
				'jabatan' => $jabatan,
				'tanggalAktifJabatan' => $tanggalAktifJabatan,
				'tanggalMasuk' => $tanggalMasuk,
				'statusKaryawan' => $statusKaryawan,
				'roles' => $roles
			);

			if ($jabatan != $currentJabatan) {
				$jobHistoryData = array(
					'nip' => $nip,
					'previousJabatan' => $currentJabatan,
					'newJabatan' => $jabatan,
					'startDate' => date('Y-m-d'),
					'endDate' => $tanggalAktifJabatan,

				);
				$this->user_model->insertJobHistory($jobHistoryData);
			}


			$this->load->model('user_model');
			$this->user_model->updateUser($nip, $data);
			$this->session->set_flashdata('success', 'Data Berhasil Diupdate');
			redirect(base_url('welcome/list'));
		}
	}


	function logout()
	{
		session_destroy();
		redirect(base_url('welcome/login'));
	}
}
