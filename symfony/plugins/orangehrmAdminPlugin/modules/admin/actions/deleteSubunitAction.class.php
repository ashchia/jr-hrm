<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 *
 */
class deleteSubunitAction extends sfAction {

    private $companyStructureService;

    public function getCompanyStructureService() {
        if (is_null($this->companyStructureService)) {
            $this->companyStructureService = new CompanyStructureService();
            $this->companyStructureService->setCompanyStructureDao(new CompanyStructureDao());
        }
        return $this->companyStructureService;
    }

    public function setCompanyStructureService(CompanyStructureService $companyStructureService) {
        $this->companyStructureService = $companyStructureService;
    }

    public function execute($request) {
        $id = trim($request->getParameter('subunitId'));

        try {
            $form = new DefaultListForm(array(), array(), true);
            $form->bind($request->getParameter($form->getName()));
            
            if ($form->isValid()) {
                $subunit = $this->getCompanyStructureService()->getSubunitById($id);
                $result = $this->getCompanyStructureService()->deleteSubunit($subunit);
            }
            
            if ($result) {
                $object->messageType = 'success';
                $object->message = __(TopLevelMessages::DELETE_SUCCESS);
            } else {
                $object->messageType = 'failure';
                $object->message = __('Failed to Delete Subunit');
            }
        } catch (Exception $e) {
            $object->messageType = 'failure';
            $object->message = __('Failed to Delete Subunit');
        }

        @ob_clean();
        return $this->renderText(json_encode($object));
    }

}

