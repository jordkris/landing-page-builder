<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_landingpage extends CI_Model
{
    public function getAll()
    {
        $allLandingpage = $this->db->get('landingpage')->result_array();
        $res = [];
        foreach ($allLandingpage as $key => $val) {
            $res[$key] = $val;
            $temp = $this->db->get_where('users', ['id' => $val['user-id']])->row_array();
            unset($temp['password']);
            $res[$key]['users'] = $temp;
        }
        return $res;
    }

    public function isValidDraftToken($token)
    {
        return $this->db->get_where('landingpage', ['draft-token' => $token])->num_rows();
    }

    public function isValidUrl($url)
    {
        return $this->db->get_where('landingpage', ['url' => $url])->num_rows();
    }

    public function isPublished($url)
    {
        $this->db->select('is-published');
        return $this->db->get_where('landingpage', ['url' => $url])->row_array();
    }

    public function isPublishedById($id)
    {
        $this->db->select('is-published');
        return $this->db->get_where('landingpage', ['id' => $id])->row_array();
    }

    public function publishLandingPage($id)
    {
        $isPublished = $this->isPublishedById($id)['is-published'];
        if ($isPublished == 0) {
            $this->db->set('is-published', 1);
        } else {
            $this->db->set('is-published', 0);
        }
        $this->db->where('id', $id);
        $this->db->update('landingpage');
        return $isPublished;
    }

    public function getIdByDraftToken($token)
    {
        $this->db->select('id');
        return $this->db->get_where('landingpage', ['draft-token' => $token])->row_array()['id'];
    }

    public function getIdByToken($token)
    {
        $this->db->select('id');

        return $this->db->get_where('landingpage', ['url' => base_url('id/p/') . $token])->row_array()['id'];
    }

    public function getProduct($id)
    {
        return $this->db->get_where('landingpage', ['id' => $id])->row_array();
    }

    public function getProductImage($id)
    {
        return $this->db->get_where('product-image', ['landingpage-id' => $id])->result_array();
    }
    public function getProductBackgroundColor($id)
    {
        return $this->db->get_where('product-background-color', ['landingpage-id' => $id])->result_array();
    }

    public function getProductBackgroundImage($id)
    {
        return $this->db->get_where('product-background-image', ['landingpage-id' => $id])->result_array();
    }

    public function getProductHeadline($id)
    {
        return $this->db->get_where('product-headline', ['landingpage-id' => $id])->result_array();
    }

    public function getProductSubheadline($id)
    {
        return $this->db->get_where('product-subheadline', ['landingpage-id' => $id])->result_array();
    }

    public function getProductSubheadlineDetail($subheadline_id)
    {
        // $getProductSubheadline($landingpageid);
        return $this->db->get_where('product-subheadline-detail', ['subheadline-id' => $subheadline_id])->result_array();
    }

    public function getProductDescription($id)
    {
        return $this->db->get_where('product-description', ['landingpage-id' => $id])->result_array();
    }
    public function getProductFeatureBenefit($id)
    {
        return $this->db->get_where('product-feature-benefit', ['landingpage-id' => $id])->result_array();
    }
    public function getProductPreview($id)
    {
        return $this->db->get_where('product-preview', ['landingpage-id' => $id])->result_array();
    }
    public function getProductScarity($id)
    {
        return $this->db->get_where('product-scarity', ['landingpage-id' => $id])->result_array();
    }
    public function getProductPreCTA($id)
    {
        return $this->db->get_where('product-precta', ['landingpage-id' => $id])->result_array();
    }
    public function getProductPricelist($id)
    {
        return $this->db->get_where('product-pricelist', ['landingpage-id' => $id])->result_array();
    }
    public function getProductSatisfy($id)
    {
        return $this->db->get_where('product-satisfy', ['landingpage-id' => $id])->result_array();
    }
    public function getProductCTA($id)
    {
        return $this->db->get_where('product-cta', ['landingpage-id' => $id])->result_array();
    }
    public function getProductFAQ($id)
    {
        return $this->db->get_where('product-faq', ['landingpage-id' => $id])->result_array();
    }
    public function getProductCreator($id)
    {
        return $this->db->get_where('product-creator', ['landingpage-id' => $id])->result_array();
    }
    public function getProductPsDisclaimer($id)
    {
        return $this->db->get_where('product-ps-disclaimer', ['landingpage-id' => $id])->result_array();
    }

    public function getSubheadlineIdByLandingPageId($landingpage_id)
    {
        return $this->db->get_where('product-subheadline', ['landingpage-id' => $landingpage_id])->row_array();
    }

    public function getLandingpageUrlById($id)
    {
        $this->db->select('url');
        return $this->db->get_where('landingpage', ['id' => $id])->row_array();
    }

    public function isEmptyDraftToken($id)
    {
        $landingpage = $this->db->get_where('landingpage', ['id' => $id])->row_array();
        // print_r($landingpage);
        if (empty($landingpage['draft-token'])) {
            return "true";
        } else {
            return "false";
        }
    }

    // public function resizeImage($path, $filename)
    // {
    //     $source_path = $path . '/' . $filename;
    //     $target_path = $path . '/resized/';
    //     $config = array(
    //         'image_library' => 'gd2',
    //         'source_image' => $source_path,
    //         'new_image' => $target_path,
    //         'maintain_ratio' => TRUE,
    //         'width' => 600,
    //     );
    //     $this->load->library('image_lib', $config);
    //     $this->image_lib->resize();
    //     if (!$this->image_lib->resize()) {
    //         echo $this->image_lib->display_errors();
    //     }
    // }

    public function upload_config($path)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
    }

    public function upload_file($path, $postName)
    {
        if (!empty($_FILES[$postName]['name'])) {
            $_FILES['file']['name'] = $_FILES[$postName]['name'];
            $_FILES['file']['type'] = $_FILES[$postName]['type'];
            $_FILES['file']['tmp_name'] = $_FILES[$postName]['tmp_name'];
            $_FILES['file']['error'] = $_FILES[$postName]['error'];
            $_FILES['file']['size'] = $_FILES[$postName]['size'];
            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                // $this->resizeImage($path, $uploadData['file_name']);
                // unlink($path . '/' . $uploadData['file_name']);
                return $uploadData;
            } else {
                $uploadData['file_name'] = '';
                return $uploadData;
            }
        } else {
            $uploadData['file_name'] = '';
            return $uploadData;
        }
    }

    public function getLastLandingPageId()
    {
        $this->db->select('MAX(id) AS last_id');
        return $this->db->get('landingpage')->row_array();
    }

    public function addLandingPage($data, $user_id, $status)
    {
        if ($status == 'unpublish') {
            $is_published = 0;
        } else if ($status == 'publish') {
            $is_published = 1;
        } else {
            redirect('error_404');
        }
        // landingpage table
        $temp = [
            'name' => $data['product-name'],
            'url' => $data['product-url'],
            'user-id' => $user_id,
            'background-type' => $data['radio-product-background'],
            'draft-token' => generateRandomString(100),
            'is-published' => $is_published,
            'date-created' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('landingpage', $temp);
    }

    public function addProductImage($data, $landingpage_id)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        $temp_image = $this->upload_file($path, 'product-image');
        $temp_image2 = $this->upload_file($path, 'product-logo');
        $temp = [
            'landingpage-id' => $landingpage_id,
            'path' => $temp_image['file_name'],
            'logo-path' => $temp_image2['file_name'],
        ];
        $this->db->insert('product-image', $temp);
    }

    public function addBackgroundColor($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'html-color-code' => $data['product-background-color'],
        ];
        $this->db->insert('product-background-color', $temp);
    }

    public function addBackgroundImage($data, $landingpage_id)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        $temp_image = $this->upload_file($path, 'product-background-image');
        $temp = [
            'landingpage-id' => $landingpage_id,
            'path' => $temp_image['file_name'],
        ];
        $this->db->insert('product-background-image', $temp);
    }

    public function addHeadline($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'headline-1' => $data['product-headline-1'],
            'headline-2' => $data['product-headline-2'],
        ];
        $this->db->insert('product-headline', $temp);
    }

    public function getLastSubheadlineId()
    {
        $this->db->select('MAX(id) AS last_id');
        return $this->db->get('product-subheadline')->row_array();
    }

    public function addSubHeadline($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'text' => $data['product-subheadline'],
        ];
        $this->db->insert('product-subheadline', $temp);
    }

    public function addSubHeadlineDetail($data, $subheadline_id, $mode = 'multi')
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-subheadline-detail'); $i++) {
                $temp_image = $this->upload_file($path, 'product-subheadline-detail-icon-' . $i);
                $temp = [
                    'subheadline-id' => $subheadline_id,
                    'text' => $data['product-subheadline-detail-' . $i],
                    'image' => $temp_image['file_name']
                ];
                $this->db->insert('product-subheadline-detail', $temp);
            }
        } else {
            $temp_image = $this->upload_file($path, 'product-subheadline-detail-icon-new');
            $temp = [
                'subheadline-id' => $subheadline_id,
                'text' => $data['product-subheadline-detail-new'],
                'image' => $temp_image['file_name']
            ];
            $this->db->insert('product-subheadline-detail', $temp);
        }
    }

    public function addProductDescription($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'text' => $data['product-description'],
        ];
        $this->db->insert('product-description', $temp);
    }

    public function addFeatureBenefit($data, $landingpage_id, $mode = 'multi')
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-feature-benefit'); $i++) {
                $temp_image = $this->upload_file($path, 'product-feature-benefit-icon-' . $i);
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'text' => $data['product-feature-benefit-' . $i],
                    'icon' => $temp_image['file_name']
                ];
                $this->db->insert('product-feature-benefit', $temp);
            }
        } else {
            $temp_image = $this->upload_file($path, 'product-feature-benefit-icon-new');
            $temp = [
                'landingpage-id' => $landingpage_id,
                'text' => $data['product-feature-benefit-new'],
                'icon' => $temp_image['file_name']
            ];
            $this->db->insert('product-feature-benefit', $temp);
        }
    }

    public function addProductPreview($data, $landingpage_id, $mode = 'multi')
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-preview'); $i++) {
                $temp_image = $this->upload_file($path, 'product-preview-icon-' . $i);
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'icon' => $temp_image['file_name'],
                    'caption' => $data['product-preview-' . $i]
                ];
                $this->db->insert('product-preview', $temp);
            }
        } else {
            $temp_image = $this->upload_file($path, 'product-preview-icon-new');
            $temp = [
                'landingpage-id' => $landingpage_id,
                'icon' => $temp_image['file_name'],
                'caption' => $data['product-preview-new']
            ];
            $this->db->insert('product-preview', $temp);
        }
    }

    public function addProductScarity($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'text' => $data['product-scarity'],
        ];
        $this->db->insert('product-scarity', $temp);
    }

    public function addProductPreCTA($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'selling-price' => $data['product-selling-price'],
            'strike-price' => $data['product-strike-price'],
        ];
        $this->db->insert('product-precta', $temp);
    }

    public function addPricelist($data, $landingpage_id, $mode = 'multi')
    {
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-package-description'); $i++) {
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'package' => $data['product-package-' . $i],
                    'price' => $data['product-price-' . $i],
                    'description' => $data['product-package-description-' . $i],
                    'url' => $data['product-package-url-' . $i]
                ];
                $this->db->insert('product-pricelist', $temp);
            }
        } else {
            $temp = [
                'landingpage-id' => $landingpage_id,
                'package' => $data['product-package-name-new'],
                'price' => $data['product-price-new'],
                'description' => $data['product-package-description-new'],
                'url' => $data['product-package-url-new']
            ];
            $this->db->insert('product-pricelist', $temp);
        }
    }

    public function addSatisfy($data, $landingpage_id, $mode = 'multi')
    {
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-satisfy'); $i++) {
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'text' => $data['product-satisfy-' . $i]
                ];
                $this->db->insert('product-satisfy', $temp);
            }
        } else {
            $temp = [
                'landingpage-id' => $landingpage_id,
                'text' => $data['product-satisfy-new']
            ];
            $this->db->insert('product-satisfy', $temp);
        }
    }

    public function addProductCTA($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'text' => $data['product-cta'],
        ];
        $this->db->insert('product-cta', $temp);
    }

    public function addFaq($data, $landingpage_id, $mode = 'multi')
    {
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-question'); $i++) {
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'question-text' => $data['product-question-' . $i],
                    'answer-text' => $data['product-answer-' . $i]
                ];
                $this->db->insert('product-faq', $temp);
            }
        } else {
            $temp = [
                'landingpage-id' => $landingpage_id,
                'question-text' => $data['product-question-new'],
                'answer-text' => $data['product-answer-new']
            ];
            $this->db->insert('product-faq', $temp);
        }
    }

    public function addProductCreator($data, $landingpage_id, $mode = 'multi')
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-creator'); $i++) {
                $temp_image = $this->upload_file($path, 'product-creator-image-' . $i);
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'name' => $data['product-creator-name-' . $i],
                    'image-path' => $temp_image['file_name']
                ];
                $this->db->insert('product-creator', $temp);
            }
        } else {
            $temp_image = $this->upload_file($path, 'product-creator-image-new');
            $temp = [
                'landingpage-id' => $landingpage_id,
                'name' => $data['product-creator-name-new'],
                'image-path' => $temp_image['file_name']
            ];
            $this->db->insert('product-creator', $temp);
        }
    }

    public function addPsDisclaimer($data, $landingpage_id, $mode = 'multi')
    {
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-ps-disclaimer'); $i++) {
                $temp = [
                    'landingpage-id' => $landingpage_id,
                    'text' => $data['product-ps-disclaimer-' . $i],
                ];
                $this->db->insert('product-ps-disclaimer', $temp);
            }
        } else {
            $temp = [
                'landingpage-id' => $landingpage_id,
                'text' => $data['product-ps-disclaimer-new'],
            ];
            $this->db->insert('product-ps-disclaimer', $temp);
        }
    }

    public function deleteLandingPage($landingpage_id)
    {
        $this->db->delete('landingpage', ['id' => $landingpage_id]);
    }

    public function checkUrl($url)
    {
        $count = $this->db->get_where('landingpage', ['url' => $url])->num_rows();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProductUrl($id, $data)
    {
        $this->db->set('url', $data['product-url']);
        $this->db->where('id', $id);
        $this->db->update('landingpage');
    }

    public function updateProductName($id, $data)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        if ($_FILES['product-image']['name'] != '') {
            $temp_image = $this->upload_file($path, 'product-image');
            $this->db->set('path', $temp_image['file_name']);
            $this->db->where('landingpage-id', $id);
            $this->db->update('product-image');
        }
        if ($_FILES['product-logo']['name'] != '') {
            $temp_image = $this->upload_file($path, 'product-logo');
            $this->db->set('logo-path', $temp_image['file_name']);
            $this->db->where('landingpage-id', $id);
            $this->db->update('product-image');
        }
        $this->db->set('name', $data['product-name']);
        $this->db->where('id', $id);
        $this->db->update('landingpage');
    }

    public function updateProductBackground($id, $data)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        // background type
        $this->db->set('background-type', $data['radio-product-background']);
        $this->db->where('id', $id);
        $this->db->update('landingpage');
        // background color
        $this->db->set('html-color-code', $data['product-background-color']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-background-color');
        // background image
        if ($_FILES['product-background-image']['name'] != '') {
            $temp_image = $this->upload_file($path, 'product-background-image');
            $this->db->set('path', $temp_image['file_name']);
            $this->db->where('landingpage-id', $id);
            $this->db->update('product-background-image');
        }
    }

    public function updateProductHeadline($id, $data)
    {
        $this->db->set('headline-1', $data['product-headline-1']);
        $this->db->set('headline-2', $data['product-headline-2']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-headline');
    }

    public function updateProductSubheadline($id, $data)
    {
        $this->db->set('text', $data['product-subheadline']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-subheadline');
    }

    public function updateProductSubheadlineDetail($data)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        foreach ($data as $key => $val) {
            if (contains($key, 'detail')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                if ($_FILES['product-subheadline-detail-icon-' . $id]['name'] != '') {
                    $temp_image = $this->upload_file($path, 'product-subheadline-detail-icon-' . $id);
                    $this->db->set('image', $temp_image['file_name']);
                }
                $this->db->set('text', $val);
                $this->db->where('id', $id);
                $this->db->update('product-subheadline-detail');
            }
        }
    }

    public function updateProductDescription($id, $data)
    {
        $this->db->set('text', $data['product-description']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-description');
    }

    public function updateProductFeatureBenefit($data)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        foreach ($data as $key => $val) {
            $arrKey = explode('-', $key);
            $id = end($arrKey);
            if ($_FILES['product-feature-benefit-icon-' . $id]['name'] != '') {
                $temp_image = $this->upload_file($path, 'product-feature-benefit-icon-' . $id);
                $this->db->set('icon', $temp_image['file_name']);
            }
            $this->db->set('text', $val);
            $this->db->where('id', $id);
            $this->db->update('product-feature-benefit');
        }
    }

    public function updateProductPreview($data)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        foreach ($data as $key => $val) {
            $arrKey = explode('-', $key);
            $id = end($arrKey);
            if ($_FILES['product-preview-icon-' . $id]['name'] != '') {
                $temp_image = $this->upload_file($path, 'product-preview-icon-' . $id);
                $this->db->set('icon', $temp_image['file_name']);
            }
            $this->db->set('caption', $val);
            $this->db->where('id', $id);
            $this->db->update('product-preview');
        }
    }

    public function updateProductScarity($id, $data)
    {
        $this->db->set('text', $data['product-scarity']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-scarity');
    }

    public function updateProductPreCTA($id, $data)
    {
        $this->db->set('selling-price', $data['product-selling-price']);
        $this->db->set('strike-price', $data['product-strike-price']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-precta');
    }

    public function updateProductPricelist($data)
    {
        foreach ($data as $key => $val) {
            if (contains($key, 'name')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                $this->db->set('package', $val);
                $this->db->where('id', $id);
                $this->db->update('product-pricelist');
            } else if (contains($key, 'price')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                $this->db->set('price', $val);
                $this->db->where('id', $id);
                $this->db->update('product-pricelist');
            } else if (contains($key, 'url')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                $this->db->set('url', $val);
                $this->db->where('id', $id);
                $this->db->update('product-pricelist');
            } else if (contains($key, 'description')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                $this->db->set('description', $val);
                $this->db->where('id', $id);
                $this->db->update('product-pricelist');
            }
        }
    }

    public function updateProductSatisfy($data)
    {
        foreach ($data as $key => $val) {
            $arrKey = explode('-', $key);
            $id = end($arrKey);
            $this->db->set('text', $val);
            $this->db->where('id', $id);
            $this->db->update('product-satisfy');
        }
    }

    public function updateProductCTA($id, $data)
    {
        $this->db->set('text', $data['product-cta']);
        $this->db->where('landingpage-id', $id);
        $this->db->update('product-cta');
    }

    public function updateProductFAQ($data)
    {
        foreach ($data as $key => $val) {
            if (contains($key, 'question')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                $this->db->set('question-text', $val);
                $this->db->where('id', $id);
                $this->db->update('product-faq');
            } else if (contains($key, 'answer')) {
                $arrKey = explode('-', $key);
                $id = end($arrKey);
                $this->db->set('answer-text', $val);
                $this->db->where('id', $id);
                $this->db->update('product-faq');
            }
        }
    }

    public function updateProductCreator($data)
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        foreach ($data as $key => $val) {
            $arrKey = explode('-', $key);
            $id = end($arrKey);
            if ($_FILES['product-creator-image-' . $id]['name'] != '') {
                $temp_image = $this->upload_file($path, 'product-creator-image-' . $id);
                $this->db->set('image-path', $temp_image['file_name']);
            }
            $this->db->set('name', $val);
            $this->db->where('id', $id);
            $this->db->update('product-creator');
        }
    }

    public function updateProductPsDisclaimer($data)
    {
        foreach ($data as $key => $val) {
            $arrKey = explode('-', $key);
            $id = end($arrKey);
            $this->db->set('text', $val);
            $this->db->where('id', $id);
            $this->db->update('product-ps-disclaimer');
        }
    }

    public function deleteSubheadlineDetail($id)
    {
        $this->db->delete('product-subheadline-detail', ['id' => $id]);
    }
    public function deleteFeatureBenefit($id)
    {
        $this->db->delete('product-feature-benefit', ['id' => $id]);
    }
    public function deleteProductPreview($id)
    {
        $this->db->delete('product-preview', ['id' => $id]);
    }
    public function deleteProductPricelist($id)
    {
        $this->db->delete('product-pricelist', ['id' => $id]);
    }
    public function deleteProductSatisfy($id)
    {
        $this->db->delete('product-pricelist', ['id' => $id]);
    }
    public function deleteProductFAQ($id)
    {
        $this->db->delete('product-faq', ['id' => $id]);
    }
    public function deleteProductCreator($id)
    {
        $this->db->delete('product-creator', ['id' => $id]);
    }
    public function deletePsDisclaimer($id)
    {
        $this->db->delete('product-ps-disclaimer', ['id' => $id]);
    }
}
