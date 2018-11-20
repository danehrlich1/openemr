<?php

/**
 * Copyright (C) 2018 Amiel Elboim <amielel@matrix.co.il>
 *
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://opensource.org/licenses/gpl-license.php>;.
 *
 * @package OpenEMR
 * @author  Amiel Elboim <amielel@matrix.co.il>
 * @link    https://www.open-emr.org
 */

namespace PrescriptionTemplates\Controller;

use Zend\View\Model\ViewModel;
use Mpdf\Mpdf;

/**
 * Class PdfTemplatesController
 * Here you can add custom pdf template for prescription.
 * How to -
 * 1. create new action function (syntax <VIEW_NAME>Action) in ths controller that load custom view
 * 2. in the 'globals settings' screen go to 'Rx' tab and save your action in the 'Name of zend template for pdf export' label
 * @package PrescriptionTemplates\Controller
 */
class PdfTemplatesController extends PrescriptionTemplatesController
{

    /**
     * default template for prescription using zend module
     */
    public function defaultAction()
    {
        $id = $this->params()->fromQuery('id');
        $defaultHtml = $this->getDefaultTemplate($id);

        $renderer = $this->getServiceLocator()->get('Zend\View\Renderer\PhpRenderer');
        $htmlView = $renderer->render($defaultHtml);

        /* create pdf */
        $mpdf = new Mpdf(array('tempDir' => $GLOBALS['MPDF_WRITE_DIR']));
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($htmlView);
        $mpdf->Output();
    }
}
