<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        setWIB();
        $this->load->model(['m_auth', 'm_flashdata', 'm_user', 'm_landingpage']);
    }

    public function index()
    {
        // $this->getAll();
        echo 'Error Occured';
    }

    public function getAllLandingPage()
    {
        $result = $this->m_landingpage->getAll();
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function getLandingPageDraft($token)
    {
        if ($this->m_landingpage->isValidDraftToken($token) > 0) {
            $id = $this->m_landingpage->getIdByDraftToken($token);
            $data['product'] = $this->m_landingpage->getProduct($id);
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
            header('Content-Type: application/json');
            echo json_encode($data, JSON_PRETTY_PRINT);
        } else {
            echo 'Token invalid';
        }
    }

    public function getLandingPage($token)
    {

        $id = $this->m_landingpage->getIdByToken($token);
        $data['product'] = $this->m_landingpage->getProduct($id);
        $data['productImage'] = $this->m_landingpage->getProductImage($id);
        $data['productBackgroundColor'] = $this->m_landingpage->getProductBackgroundColor($id);
        $data['productBackgroundImage'] = $this->m_landingpage->getProductBackgroundImage($id);
        $data['productHeadline'] = $this->m_landingpage->getProductHeadline($id);
        $data['productSubHeadline'] = $this->m_landingpage->getProductSubheadline($id);
        $subheadlineId = $this->m_landingpage->getSubheadlineIdByLandingPageId($id)['id'];
        $data['productSubheadlineDetail'] = $this->m_landingpage->getProductSubheadlineDetail($subheadlineId);
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
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getLandingPageById($id)
    {
        $data['product'] = $this->m_landingpage->getProduct($id);
        $data['productImage'] = $this->m_landingpage->getProductImage($id);
        $data['productBackgroundColor'] = $this->m_landingpage->getProductBackgroundColor($id);
        $data['productBackgroundImage'] = $this->m_landingpage->getProductBackgroundImage($id);
        $data['productHeadline'] = $this->m_landingpage->getProductHeadline($id);
        $data['productSubHeadline'] = $this->m_landingpage->getProductSubheadline($id);
        $subheadlineId = $this->m_landingpage->getSubheadlineIdByLandingPageId($id)['id'];
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
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getLandingpageUrlById($id)
    {
        $response = $this->m_landingpage->getLandingpageUrlById($id);
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function postNewLandingPage($status = 'publish')
    {
        $result = $this->input->post();
        $profile = $this->m_auth->get_session();

        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);
        echo json_encode($_FILES, JSON_PRETTY_PRINT);

        $this->m_landingpage->addLandingPage($result, $profile['id'], $status);
        $id = $this->m_landingpage->getLastLandingPageId()['last_id'];

        $this->m_landingpage->addProductImage($result, $id);
        $this->m_landingpage->addBackgroundColor($result, $id);
        $this->m_landingpage->addBackgroundImage($result, $id);
        $this->m_landingpage->addHeadline($result, $id);
        $this->m_landingpage->addSubheadline($result, $id);
        $subheadlineId = $this->m_landingpage->getLastSubheadlineId()['last_id'];
        $this->m_landingpage->addSubheadlineDetail($result, $subheadlineId);
        $this->m_landingpage->addProductDescription($result, $id);
        $this->m_landingpage->addFeatureBenefit($result, $id);
        $this->m_landingpage->addProductPreview($result, $id);
        $this->m_landingpage->addProductScarity($result, $id);
        $this->m_landingpage->addProductPreCTA($result, $id);
        $this->m_landingpage->addPricelist($result, $id);
        $this->m_landingpage->addSatisfy($result, $id);
        $this->m_landingpage->addProductCTA($result, $id);
        $this->m_landingpage->addFaq($result, $id);
        $this->m_landingpage->addProductCreator($result, $id);
        $this->m_landingpage->addPsDisclaimer($result, $id);

        $this->m_flashdata->set('success', 'Data Landingpage berhasil ditambahkan!');
        redirect('landingpage/lists');
    }

    public function publishLandingPage($id)
    {
        $isPublished = $this->m_landingpage->publishLandingPage($id);
        if ($isPublished == 0) {
            $this->m_flashdata->set('success', 'Data Landingpage berhasil diaktifkan!');
        } else {
            $this->m_flashdata->set('success', 'Data Landingpage berhasil dinonaktifkan!');
        }
        redirect('landingpage/lists');
    }

    public function deleteLandingPage($id)
    {
        $this->m_landingpage->deleteLandingPage($id);
        $this->m_flashdata->set('success', 'Data Landingpage berhasil dihapus!');
        redirect('landingpage/lists');
    }

    public function checkUrl()
    {
        $url = $this->input->get('url');
        $response = new stdClass();
        if ($this->m_landingpage->checkUrl($url)) {
            $response->message = 'true';
            header('Content-Type: application/json');
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            $response->message = 'false';
            header('Content-Type: application/json');
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    public function edit_product($id, $section)
    {
        $data = $this->input->post();
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        echo json_encode($_FILES, JSON_PRETTY_PRINT);
        switch ($section) {
            case 'product-url':
                $this->m_landingpage->updateProductUrl($id, $data);
                break;
            case 'product-name':
                $this->m_landingpage->updateProductName($id, $data);
                break;
            case 'product-background':
                $this->m_landingpage->updateProductBackground($id, $data);
                break;
            case 'product-headline':
                $this->m_landingpage->updateProductHeadline($id, $data);
                break;
            case 'product-subheadline':
                $this->m_landingpage->updateProductSubheadline($id, $data);
                // $subheadlineId = $this->m_landingpage->getSubheadlineIdByLandingPageId($id)['id'];
                $this->m_landingpage->updateProductSubheadlineDetail($data);
                break;
            case 'product-description':
                $this->m_landingpage->updateProductDescription($id, $data);
                break;
            case 'product-feature-benefit':
                $this->m_landingpage->updateProductFeatureBenefit($data);
                break;
            case 'product-preview':
                $this->m_landingpage->updateProductPreview($data);
                break;
            case 'product-scarity':
                $this->m_landingpage->updateProductScarity($id, $data);
                break;
            case 'product-precta':
                $this->m_landingpage->updateProductPreCTA($id, $data);
                break;
            case 'product-pricelist':
                $this->m_landingpage->updateProductPricelist($data);
                break;
            case 'product-satisfy':
                $this->m_landingpage->updateProductSatisfy($data);
                break;
            case 'product-cta':
                $this->m_landingpage->updateProductCTA($id, $data);
                break;
            case 'product-faq':
                $this->m_landingpage->updateProductFAQ($data);
                break;
            case 'product-creator':
                $this->m_landingpage->updateProductCreator($data);
                break;
            case 'product-ps-disclaimer':
                $this->m_landingpage->updateProductPsDisclaimer($data);
                break;
        }
        $this->m_flashdata->set('success', 'Data Landingpage berhasil diperbarui!');
        redirect('landingpage/edit/' . $id . '/' . $section);
    }

    public function delete($landingPageId, $section, $subSectionId, $subSection)
    {
        switch ($subSection) {
            case 'product-subheadline-detail':
                $this->m_landingpage->deleteSubheadlineDetail($subSectionId);
                break;
            case 'product-feature-benefit':
                $this->m_landingpage->deleteFeatureBenefit($subSectionId);
                break;
            case 'product-preview':
                $this->m_landingpage->deleteProductPreview($subSectionId);
                break;
            case 'product-pricelist':
                $this->m_landingpage->deleteProductPricelist($subSectionId);
                break;
            case 'product-satisfy':
                $this->m_landingpage->deleteProductSatisfy($subSectionId);
                break;
            case 'product-faq':
                $this->m_landingpage->deleteProductFAQ($subSectionId);
                break;
            case 'product-creator':
                $this->m_landingpage->deleteProductCreator($subSectionId);
                break;
            case 'product-ps-disclaimer':
                $this->m_landingpage->deletePsDisclaimer($subSectionId);
                break;
            default:
                $this->m_flashdata->set('danger', 'Terjadi error!');
                redirect('landingpage/edit/' . $landingPageId . '/' . $section);
                break;
        }
        $this->m_flashdata->set('success', 'Data berhasil dihapus!');
        redirect('landingpage/edit/' . $landingPageId . '/' . $section);
    }

    public function add($landingPageId, $section, $subSection)
    {
        $data = $this->input->post();
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        echo json_encode($_FILES, JSON_PRETTY_PRINT);
        switch ($subSection) {
            case 'product-subheadline-detail':
                // optionalId == landingpageid
                $subheadlineId = $this->m_landingpage->getSubheadlineIdByLandingPageId($landingPageId)['id'];
                $this->m_landingpage->addSubheadlineDetail($data, $subheadlineId, 'single');
                break;
            case 'product-feature-benefit':
                $this->m_landingpage->addFeatureBenefit($data, $landingPageId, 'single');
                break;
            case 'product-preview':
                $this->m_landingpage->addProductPreview($data, $landingPageId, 'single');
                break;
            case 'product-pricelist':
                $this->m_landingpage->addPricelist($data, $landingPageId, 'single');
                break;
            case 'product-satisfy':
                $this->m_landingpage->addSatisfy($data, $landingPageId, 'single');
                break;
            case 'product-faq':
                $this->m_landingpage->addFaq($data, $landingPageId, 'single');
                break;
            case 'product-creator':
                $this->m_landingpage->addProductCreator($data, $landingPageId, 'single');
                break;
            case 'product-ps-disclaimer':
                $this->m_landingpage->addPsDisclaimer($data, $landingPageId, 'single');
                break;
            default:
                $this->m_flashdata->set('danger', 'Terjadi error!');
                redirect('landingpage/edit/' . $landingPageId . '/' . $section);
                break;
        }
        $this->m_flashdata->set('success', 'Data berhasil ditambahkan!');
        redirect('landingpage/edit/' . $landingPageId . '/' . $section);
    }

    public function editUser($id)
    {
        $data = $this->input->post();
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        echo json_encode($_FILES, JSON_PRETTY_PRINT);
        $this->m_user->updateUser($id, $data);
        // $this->m_flashdata->set('success', 'Data berhasil ditambahkan!');
        // redirect('landingpage/edit/' . $landingPageId . '/' . $section);
    }

    public function changePassword($id)
    {
        $data = $this->input->post();
        $profile = $this->m_auth->get_session();
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        echo json_encode($_FILES, JSON_PRETTY_PRINT);
        $current_password = $this->input->post('password1');
        $new_password = $this->input->post('password2');
        $confirm_new_password = $this->input->post('password3');
        if (!(md5($current_password) == $profile['password'])) {
            $this->m_flashdata->set('danger', 'Password lama salah!');
            redirect('profile/changepassword');
        } else {
            if ($current_password == $new_password) {
                $this->m_flashdata->set('danger', 'Password baru tidak boleh sama dengan password lama!');
                redirect('profile/changepassword');
            } else {
                if ($new_password == $confirm_new_password) {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->m_user->changePassword($id, $new_password);
                    $this->m_flashdata->set('success', 'Password telah berhasil diubah!');
                    redirect('profile/changepassword');
                } else {
                    $this->m_flashdata->set('danger', 'Konfirmasi password baru tidak cocok!');
                    redirect('profile/changepassword');
                }
            }
        }
        $this->m_user->updatePassword($id, $data);
        // $this->m_flashdata->set('success', 'Data berhasil ditambahkan!');
        // redirect('landingpage/edit/' . $landingPageId . '/' . $section);
    }

    public function user($id) {
        $data = $this->m_user->getUserById($id);
        unset($data['password']);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getAllUser()
    {
        $result = $this->m_user->get_all();
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function activateUser($id)
    {
        $isActive = $this->m_user->activateUser($id);
        if ($isActive == 0) {
            $this->m_flashdata->set('success', 'Akun User berhasil dinonaktifkan!');
        } else {
            $this->m_flashdata->set('success', 'Akun User berhasil diaktifkan!');
        }
        redirect('profile/manage');
    }

    public function deleteUser($id)
    {
        $this->m_user->delete($id);
        $this->m_flashdata->set('success', 'Data User berhasil dihapus!');
        redirect('profile/manage');
    }
}
