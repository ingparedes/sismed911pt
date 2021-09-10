<?php
namespace PHPMaker2020\sismed911;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$usuarios_list = new usuarios_list();

// Run the page
$usuarios_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuarios_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$usuarios_list->isExport()) { ?>
<script>
var fusuarioslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fusuarioslist = currentForm = new ew.Form("fusuarioslist", "list");
	fusuarioslist.formKeyCountName = '<?php echo $usuarios_list->FormKeyCountName ?>';
	loadjs.done("fusuarioslist");
});
var fusuarioslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fusuarioslistsrch = currentSearchForm = new ew.Form("fusuarioslistsrch");

	// Dynamic selection lists
	// Filters

	fusuarioslistsrch.filterList = <?php echo $usuarios_list->getFilterList() ?>;
	loadjs.done("fusuarioslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$usuarios_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($usuarios_list->TotalRecords > 0 && $usuarios_list->ExportOptions->visible()) { ?>
<?php $usuarios_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($usuarios_list->ImportOptions->visible()) { ?>
<?php $usuarios_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($usuarios_list->SearchOptions->visible()) { ?>
<?php $usuarios_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($usuarios_list->FilterOptions->visible()) { ?>
<?php $usuarios_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$usuarios_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$usuarios_list->isExport() && !$usuarios->CurrentAction) { ?>
<form name="fusuarioslistsrch" id="fusuarioslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fusuarioslistsrch-search-panel" class="<?php echo $usuarios_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="usuarios">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $usuarios_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($usuarios_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($usuarios_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $usuarios_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($usuarios_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($usuarios_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($usuarios_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($usuarios_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $usuarios_list->showPageHeader(); ?>
<?php
$usuarios_list->showMessage();
?>
<?php if ($usuarios_list->TotalRecords > 0 || $usuarios->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($usuarios_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> usuarios">
<?php if (!$usuarios_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$usuarios_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $usuarios_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $usuarios_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fusuarioslist" id="fusuarioslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuarios">
<div id="gmp_usuarios" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($usuarios_list->TotalRecords > 0 || $usuarios_list->isGridEdit()) { ?>
<table id="tbl_usuarioslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$usuarios->RowType = ROWTYPE_HEADER;

// Render list options
$usuarios_list->renderListOptions();

// Render list options (header, left)
$usuarios_list->ListOptions->render("header", "left");
?>
<?php if ($usuarios_list->id_user->Visible) { // id_user ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->id_user) == "") { ?>
		<th data-name="id_user" class="<?php echo $usuarios_list->id_user->headerCellClass() ?>"><div id="elh_usuarios_id_user" class="usuarios_id_user"><div class="ew-table-header-caption"><?php echo $usuarios_list->id_user->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_user" class="<?php echo $usuarios_list->id_user->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->id_user) ?>', 1);"><div id="elh_usuarios_id_user" class="usuarios_id_user">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->id_user->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->id_user->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->id_user->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->fecha_creacion->Visible) { // fecha_creacion ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->fecha_creacion) == "") { ?>
		<th data-name="fecha_creacion" class="<?php echo $usuarios_list->fecha_creacion->headerCellClass() ?>"><div id="elh_usuarios_fecha_creacion" class="usuarios_fecha_creacion"><div class="ew-table-header-caption"><?php echo $usuarios_list->fecha_creacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_creacion" class="<?php echo $usuarios_list->fecha_creacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->fecha_creacion) ?>', 1);"><div id="elh_usuarios_fecha_creacion" class="usuarios_fecha_creacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->fecha_creacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->fecha_creacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->fecha_creacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->nombres->Visible) { // nombres ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->nombres) == "") { ?>
		<th data-name="nombres" class="<?php echo $usuarios_list->nombres->headerCellClass() ?>"><div id="elh_usuarios_nombres" class="usuarios_nombres"><div class="ew-table-header-caption"><?php echo $usuarios_list->nombres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombres" class="<?php echo $usuarios_list->nombres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->nombres) ?>', 1);"><div id="elh_usuarios_nombres" class="usuarios_nombres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->nombres->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->nombres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->nombres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->apellidos->Visible) { // apellidos ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->apellidos) == "") { ?>
		<th data-name="apellidos" class="<?php echo $usuarios_list->apellidos->headerCellClass() ?>"><div id="elh_usuarios_apellidos" class="usuarios_apellidos"><div class="ew-table-header-caption"><?php echo $usuarios_list->apellidos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="apellidos" class="<?php echo $usuarios_list->apellidos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->apellidos) ?>', 1);"><div id="elh_usuarios_apellidos" class="usuarios_apellidos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->apellidos->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->apellidos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->apellidos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->telefono->Visible) { // telefono ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->telefono) == "") { ?>
		<th data-name="telefono" class="<?php echo $usuarios_list->telefono->headerCellClass() ?>"><div id="elh_usuarios_telefono" class="usuarios_telefono"><div class="ew-table-header-caption"><?php echo $usuarios_list->telefono->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono" class="<?php echo $usuarios_list->telefono->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->telefono) ?>', 1);"><div id="elh_usuarios_telefono" class="usuarios_telefono">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->telefono->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->telefono->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->telefono->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->_login->Visible) { // login ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->_login) == "") { ?>
		<th data-name="_login" class="<?php echo $usuarios_list->_login->headerCellClass() ?>"><div id="elh_usuarios__login" class="usuarios__login"><div class="ew-table-header-caption"><?php echo $usuarios_list->_login->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_login" class="<?php echo $usuarios_list->_login->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->_login) ?>', 1);"><div id="elh_usuarios__login" class="usuarios__login">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->_login->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->_login->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->_login->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->pw->Visible) { // pw ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->pw) == "") { ?>
		<th data-name="pw" class="<?php echo $usuarios_list->pw->headerCellClass() ?>"><div id="elh_usuarios_pw" class="usuarios_pw"><div class="ew-table-header-caption"><?php echo $usuarios_list->pw->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pw" class="<?php echo $usuarios_list->pw->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->pw) ?>', 1);"><div id="elh_usuarios_pw" class="usuarios_pw">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->pw->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->pw->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->pw->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->perfil->Visible) { // perfil ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->perfil) == "") { ?>
		<th data-name="perfil" class="<?php echo $usuarios_list->perfil->headerCellClass() ?>"><div id="elh_usuarios_perfil" class="usuarios_perfil"><div class="ew-table-header-caption"><?php echo $usuarios_list->perfil->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="perfil" class="<?php echo $usuarios_list->perfil->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->perfil) ?>', 1);"><div id="elh_usuarios_perfil" class="usuarios_perfil">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->perfil->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->perfil->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->perfil->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->sede->Visible) { // sede ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->sede) == "") { ?>
		<th data-name="sede" class="<?php echo $usuarios_list->sede->headerCellClass() ?>"><div id="elh_usuarios_sede" class="usuarios_sede"><div class="ew-table-header-caption"><?php echo $usuarios_list->sede->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sede" class="<?php echo $usuarios_list->sede->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->sede) ?>', 1);"><div id="elh_usuarios_sede" class="usuarios_sede">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->sede->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->sede->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->sede->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuarios_list->acode->Visible) { // acode ?>
	<?php if ($usuarios_list->SortUrl($usuarios_list->acode) == "") { ?>
		<th data-name="acode" class="<?php echo $usuarios_list->acode->headerCellClass() ?>"><div id="elh_usuarios_acode" class="usuarios_acode"><div class="ew-table-header-caption"><?php echo $usuarios_list->acode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acode" class="<?php echo $usuarios_list->acode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $usuarios_list->SortUrl($usuarios_list->acode) ?>', 1);"><div id="elh_usuarios_acode" class="usuarios_acode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuarios_list->acode->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuarios_list->acode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($usuarios_list->acode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$usuarios_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($usuarios_list->ExportAll && $usuarios_list->isExport()) {
	$usuarios_list->StopRecord = $usuarios_list->TotalRecords;
} else {

	// Set the last record to display
	if ($usuarios_list->TotalRecords > $usuarios_list->StartRecord + $usuarios_list->DisplayRecords - 1)
		$usuarios_list->StopRecord = $usuarios_list->StartRecord + $usuarios_list->DisplayRecords - 1;
	else
		$usuarios_list->StopRecord = $usuarios_list->TotalRecords;
}
$usuarios_list->RecordCount = $usuarios_list->StartRecord - 1;
if ($usuarios_list->Recordset && !$usuarios_list->Recordset->EOF) {
	$usuarios_list->Recordset->moveFirst();
	$selectLimit = $usuarios_list->UseSelectLimit;
	if (!$selectLimit && $usuarios_list->StartRecord > 1)
		$usuarios_list->Recordset->move($usuarios_list->StartRecord - 1);
} elseif (!$usuarios->AllowAddDeleteRow && $usuarios_list->StopRecord == 0) {
	$usuarios_list->StopRecord = $usuarios->GridAddRowCount;
}

// Initialize aggregate
$usuarios->RowType = ROWTYPE_AGGREGATEINIT;
$usuarios->resetAttributes();
$usuarios_list->renderRow();
while ($usuarios_list->RecordCount < $usuarios_list->StopRecord) {
	$usuarios_list->RecordCount++;
	if ($usuarios_list->RecordCount >= $usuarios_list->StartRecord) {
		$usuarios_list->RowCount++;

		// Set up key count
		$usuarios_list->KeyCount = $usuarios_list->RowIndex;

		// Init row class and style
		$usuarios->resetAttributes();
		$usuarios->CssClass = "";
		if ($usuarios_list->isGridAdd()) {
		} else {
			$usuarios_list->loadRowValues($usuarios_list->Recordset); // Load row values
		}
		$usuarios->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$usuarios->RowAttrs->merge(["data-rowindex" => $usuarios_list->RowCount, "id" => "r" . $usuarios_list->RowCount . "_usuarios", "data-rowtype" => $usuarios->RowType]);

		// Render row
		$usuarios_list->renderRow();

		// Render list options
		$usuarios_list->renderListOptions();
?>
	<tr <?php echo $usuarios->rowAttributes() ?>>
<?php

// Render list options (body, left)
$usuarios_list->ListOptions->render("body", "left", $usuarios_list->RowCount);
?>
	<?php if ($usuarios_list->id_user->Visible) { // id_user ?>
		<td data-name="id_user" <?php echo $usuarios_list->id_user->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_id_user">
<span<?php echo $usuarios_list->id_user->viewAttributes() ?>><?php echo $usuarios_list->id_user->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->fecha_creacion->Visible) { // fecha_creacion ?>
		<td data-name="fecha_creacion" <?php echo $usuarios_list->fecha_creacion->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_fecha_creacion">
<span<?php echo $usuarios_list->fecha_creacion->viewAttributes() ?>><?php echo $usuarios_list->fecha_creacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->nombres->Visible) { // nombres ?>
		<td data-name="nombres" <?php echo $usuarios_list->nombres->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_nombres">
<span<?php echo $usuarios_list->nombres->viewAttributes() ?>><?php echo $usuarios_list->nombres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->apellidos->Visible) { // apellidos ?>
		<td data-name="apellidos" <?php echo $usuarios_list->apellidos->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_apellidos">
<span<?php echo $usuarios_list->apellidos->viewAttributes() ?>><?php echo $usuarios_list->apellidos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->telefono->Visible) { // telefono ?>
		<td data-name="telefono" <?php echo $usuarios_list->telefono->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_telefono">
<span<?php echo $usuarios_list->telefono->viewAttributes() ?>><?php echo $usuarios_list->telefono->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->_login->Visible) { // login ?>
		<td data-name="_login" <?php echo $usuarios_list->_login->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios__login">
<span<?php echo $usuarios_list->_login->viewAttributes() ?>><?php echo $usuarios_list->_login->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->pw->Visible) { // pw ?>
		<td data-name="pw" <?php echo $usuarios_list->pw->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_pw">
<span<?php echo $usuarios_list->pw->viewAttributes() ?>><?php echo $usuarios_list->pw->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->perfil->Visible) { // perfil ?>
		<td data-name="perfil" <?php echo $usuarios_list->perfil->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_perfil">
<span<?php echo $usuarios_list->perfil->viewAttributes() ?>><?php echo $usuarios_list->perfil->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->sede->Visible) { // sede ?>
		<td data-name="sede" <?php echo $usuarios_list->sede->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_sede">
<span<?php echo $usuarios_list->sede->viewAttributes() ?>><?php echo $usuarios_list->sede->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuarios_list->acode->Visible) { // acode ?>
		<td data-name="acode" <?php echo $usuarios_list->acode->cellAttributes() ?>>
<span id="el<?php echo $usuarios_list->RowCount ?>_usuarios_acode">
<span<?php echo $usuarios_list->acode->viewAttributes() ?>><?php echo $usuarios_list->acode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$usuarios_list->ListOptions->render("body", "right", $usuarios_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$usuarios_list->isGridAdd())
		$usuarios_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$usuarios->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($usuarios_list->Recordset)
	$usuarios_list->Recordset->Close();
?>
<?php if (!$usuarios_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$usuarios_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $usuarios_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $usuarios_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($usuarios_list->TotalRecords == 0 && !$usuarios->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $usuarios_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$usuarios_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$usuarios_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$usuarios_list->terminate();
?>