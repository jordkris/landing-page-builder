<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        setWIB();
        $this->load->model(['m_auth', 'm_flashdata', 'm_user', 'm_landingpage']);
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'Create New Landing Page';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_landingpage');
        $this->load->view('main_templates/V_footer');
    }

    public function lists()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'List Landing Page';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_landingpage_list');
        $this->load->view('main_templates/V_footer');
    }

    public function edit($id, $section)
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'Edit Landing Page';
        $data['product'] = $this->m_landingpage->getProduct($id);
        $data['section'] = $section;
        $data['id'] = $id;
        // $data['last_id']['subHeadlineDetail'] = $this->m_landingpage->getLastSubheadlineId();
        // $data['last_id']['featureBenefit'] = $this->m_landingpage->getLastFeatureBenefitId();
        // $data['last_id']['productPreview'] = $this->m_landingpage->getLastProductPreviewId(); 
        // $data['last_id']['productPricelist'] = $this->m_landingpage->getLastProductPricelistId(); 
        // $data['last_id']['productPricelist'] = $this->m_landingpage->getLastProductPricelistId(); 
        // if ($this->m_landingpage->isEmptyDraftToken($id) == "true") {
        //     $data['token'] = end(explode("/", $data['product']['url']));
        // } else {
        //     $data['token'] = $data['product']['draft-token'];
        // }

        $data['productImage'] = $this->m_landingpage->getProductImage($id);
        $data['productBackgroundColor'] = $this->m_landingpage->getProductBackgroundColor($id);
        $data['productBackgroundImage'] = $this->m_landingpage->getProductBackgroundImage($id);
        $data['productHeadline'] = $this->m_landingpage->getProductHeadline($id);
        $data['productSubHeadline'] = $this->m_landingpage->getProductSubheadline($id);
        $data['productSubheadlineDetail'] = $this->m_landingpage->getProductSubheadlineDetail($id);
        $data['productDescription'] = $this->m_landingpage->getProductDescription($id);
        $data['productFeatureBenefit'] = $this->m_landingpage->getProductFeatureBenefit($id);
        $data['productPreview'] = $this->m_landingpage->getProductPreview($id);
        $data['productScarity'] = $this->m_landingpage->getProductScarity($id);
        $data['productPreCTA'] = $this->m_landingpage->getProductPreCTA($id);
        $data['productPricelist'] = $this->m_landingpage->getProductPricelist($id);
        $data['productSatisfy'] = $this->m_landingpage->getProductSatisfy($id);
        $data['productCTA'] = $this->m_landingpage->getProductCTA($id);
        $data['productFAQ'] = $this->m_landingpage->getProductFAQ($id);
        $data['productCreator'] = $this->m_landingpage->getProductCreator($id);
        $data['productPsDisclaimer'] = $this->m_landingpage->getProductPsDisclaimer($id);
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_landingpage_edit');
        $this->load->view('main_templates/V_footer_edit');
    }

    public function temp($id)
    {
    }
}
