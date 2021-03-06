<?php
/* Smarty version 3.1.33, created on 2019-06-24 13:35:50
  from 'D:\Aplikacje\XAMPP\htdocs\Projekt\app\views\ManageUsersView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d10b596ce0e80_25296698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a7a0563556299781f4d1aa83b4ecf6480c028f9' => 
    array (
      0 => 'D:\\Aplikacje\\XAMPP\\htdocs\\Projekt\\app\\views\\ManageUsersView.tpl',
      1 => 1561371595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d10b596ce0e80_25296698 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2563976935d10b596cc3926_97200734', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_2563976935d10b596cc3926_97200734 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_2563976935d10b596cc3926_97200734',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="jumbotron top-space">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Strona główna</a></li>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</li>
            </ol>
            <h2 class="text-center thin">Użytkownicy</h2>
            <?php if (isset($_smarty_tpl->tpl_vars['details']->value)) {?>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Parametr</th>
                        <th scope="col">Wartość</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userDetails']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['edit']->value)) {?>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Edycja użytkownika</h3>
                            <p class="text-center text-muted">Jeżeli nie chcesz edytować niektórych pól, pozostaw je bez zmian.</p>
                            <hr>
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userEdit">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userDetails']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['key']->value == 'id') {?>
                                        <input type="hidden" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
">
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['key']->value != 'id' && $_smarty_tpl->tpl_vars['key']->value != 'id_role' && $_smarty_tpl->tpl_vars['key']->value != 'name') {?>
                                        <div class="form-group">
                                            <label for="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</label>
                                            <input class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
">
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['key']->value == 'id_role') {?>
                                        <div class="form-group">
                                            <label for="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Rola</label>
                                            <select class="form-control" name="id_role">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id_role'];?>
"<?php if ($_smarty_tpl->tpl_vars['role']->value['id_role'] == $_smarty_tpl->tpl_vars['val']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <input type="submit" value="Edytuj" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            <?php }?>
            <table id="usersValues" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                    <tr>
                        <th scope="row"><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Profil</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
/details/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Szczegóły</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Edytuj</a></li>
                                    <?php if (core\RoleUtils::inRole("admin")) {?>
                                        <li><a class="dropdown-item" onclick="deleteUser('<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
')" href="#">Usuń</a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

            <?php if ($_smarty_tpl->tpl_vars['previous_page']->value > 0) {?>
                <a type="button" class="btn btn-light btn-sm float-right" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers/<?php echo $_smarty_tpl->tpl_vars['previous_page']->value;?>
">Załaduj poprzednie rekordy</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['isNextPage']->value) {?>
                <a type="button" class="btn btn-light btn-sm float-right" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers/<?php echo $_smarty_tpl->tpl_vars['next_page']->value;?>
">Załaduj następne rekordy</a>
            <?php }?>
            <a type="button" class="btn btn-light btn-sm float-right" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers/0">Załaduj wszystkich użytkowników</a>
        </div>
    </div>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $('#usersValues').DataTable();
        });
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        function deleteUser(id) {
            if (confirm("Na pewno chcesz usunąć użytkownika? Nie można będzie cofnąć tej operacji")) {
                window.location.href = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
/delete/'+id;
            }
        }
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'intro'} */
}
