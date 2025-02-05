<?php
/**
 * OrangeHRM Enterprise is a closed sourced comprehensive Human Resource Management (HRM)
 * System that captures all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM Inc is the owner of the patent, copyright, trade secrets, trademarks and any
 * other intellectual property rights which subsist in the Licensed Materials. OrangeHRM Inc
 * is the owner of the media / downloaded OrangeHRM Enterprise software files on which the
 * Licensed Materials are received. Title to the Licensed Materials and media shall remain
 * vested in OrangeHRM Inc. For the avoidance of doubt title and all intellectual property
 * rights to any design, new software, new protocol, new interface, enhancement, update,
 * derivative works, revised screen text or any other items that OrangeHRM Inc creates for
 * Customer shall remain vested in OrangeHRM Inc. Any rights not expressly granted herein are
 * reserved to OrangeHRM Inc.
 *
 * You should have received a copy of the OrangeHRM Enterprise  proprietary license file along
 * with this program; if not, write to the OrangeHRM Inc. 538 Teal Plaza, Secaucus , NJ 0709
 * to get the file.
 *
 */
?>

<?php 
use_javascript(plugin_web_path('orangehrmAdminPlugin', 'js/viewProjectsSuccess')); 
?>

<div id="searchProject" class="box searchForm toggableForm">
    <div class="head">
            <h1 id="searchProjectHeading"><?php echo __("Projects"); ?></h1>
    </div>
    <div class="inner">
        <form name="frmSearchProject" id="frmSearchProject" method="post" action="<?php echo url_for('admin/viewProjects'); ?>" >
            
            <fieldset>
                
                <ol>
                    <?php echo $form->render(); ?>
                </ol>
                
                <p>
                    <input type="button" class="" name="btnSave" id="btnSearch" value="<?php echo __("Search"); ?>"/>
                    <input type="button" class="reset" name="btnReset" id="btnReset" value="<?php echo __("Reset"); ?>"/>
                </p>

            </fieldset>
        </form>
    </div>
    <a href="#" class="toggle tiptip" title="<?php echo __(CommonMessages::TOGGABLE_DEFAULT_MESSAGE); ?>">&gt;</a>
</div>
<div id="customerList">
    <?php include_component('core', 'ohrmList', $parmetersForListCompoment); ?>
</div>

<form name="frmHiddenParam" id="frmHiddenParam" method="post" action="<?php echo url_for('admin/viewProjects'); ?>">
    <input type="hidden" name="pageNo" id="pageNo"/>
    <input type="hidden" name="hdnAction" id="hdnAction" value="search" />
</form>

<!-- Confirmation box HTML: Begins -->
<div class="modal hide" id="deleteConfModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo __('Just Recruit - Confirmation Required'); ?></h3>
  </div>
  <div class="modal-body">
    <p><?php echo __(CommonMessages::DELETE_CONFIRMATION); ?></p>
  </div>
  <div class="modal-footer">
    <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="<?php echo __('Ok'); ?>" />
    <input type="button" class="btn reset" data-dismiss="modal" value="<?php echo __('Cancel'); ?>" />
  </div>
</div>
<!-- Confirmation box HTML: Ends -->

<script type="text/javascript">
    var addProjectUrl = '<?php echo url_for('admin/saveProject'); ?>';
    var viewProjectUrl = '<?php echo url_for('admin/viewProjects'); ?>';
    var customers = <?php echo str_replace('&#039;', "'", $form->getCustomerListAsJson()) ?> ;
    var customersArray = eval(customers);
    var projects = <?php echo str_replace('&#039;', "'", $form->getProjectListAsJson()) ?> ;
    var projectsArray = eval(projects);
    var projectAdmins = <?php echo str_replace('&#039;', "'", $form->getProjectAdminListAsJson()) ?> ;
    var projectAdminsArray = eval(projectAdmins);
    var lang_typeForHints = '<?php echo __("Type for hints") . "..."; ?>';
</script>
