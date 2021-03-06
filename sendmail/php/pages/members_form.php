<?php
/* shared between members.php and members_add.php */
if (!$member_data) {
    $member_data = array();
}
$groups = $newsletter->get_groups($db);
$campaigns = $newsletter->get_campaigns($db);
$member_fields = $newsletter->get_member_fields_hung($db);
?>

<table class="table_ct table-hover">
    <tr>
        <td valign="top" width="10%">Civilit&eacute;: </td>
        <td valign="top" width="83%">
            <select name='civilite' style="width: 312px; cursor: pointer;">
                <?php
                $items = array('Mlle', 'Mme', 'Mr');
                foreach ($items as $i) {
                    if ($i == $member_data['civilite']) {
                        $sel = " selected";
                    } else {
                        $sel = "";
                    }
                    echo "<option value='" . $i . "'" . $sel . ">" . $i . "</option>";
                }
                ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>Email: </td>
        <td valign="top" width="83%"><input type="text" name="mem_email" id="email" class="input_wd" value="<?php echo $member_data['email']; ?>" /></td>
    </tr>
    <tr>
        <td>First Name: </td>
        <td valign="top" width="83%"><input type="text" name="mem_first_name" id="first_name" class="input_wd" value="<?php echo $member_data['first_name']; ?>" /></td>
    </tr>
    <tr>
        <td>Last Name: </td>
        <td valign="top" width="83%"><input type="text" name="mem_last_name" id="last_name" class="input_wd" value="<?php echo $member_data['last_name']; ?>" /></td>
    </tr>
    <tr>
        <td>Soci&eacute;t&eacute;: </td>
        <td valign="top" width="83%"><input type="text" name="societe" id="societe" class="input_wd" value="<?php echo $member_data['societe']; ?>" /></td>
    </tr>
    <?php
    foreach ($member_fields as $member_field) {
        ?>
        <tr>
            <td>
                <?php echo $member_field['field_name']; ?>
                <?php if ($member_field['required']) { ?>
                    <span class="required">*</span>
                <?php } ?>
            </td>
            <td valign="top" width="83%">
                <input type="text" class="input_wd" name="mem_custom_val[<?php echo $member_field['field_name']; ?>]" value="<?php echo $member_data['custom'][$member_field['member_field_id']]['value']; ?>" />
            </td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td>Groups: </td>
        <td colspan="4">
            <?php foreach ($groups as $group) { ?>
                <input type="checkbox" name="group_id[]" value="<?php echo $group['group_id']; ?>" <?php echo ($member_data['groups'][$group['group_id']]) ? 'checked' : ''; ?>> <?php echo $group['group_name']; ?> <br>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td>Campaigns: </td>
        <td>
            <?php foreach ($campaigns as $campaign) { ?>
                <input type="checkbox" name="campaign_id[]" value="<?php echo $campaign['campaign_id']; ?>" <?php echo ($member_data['campaigns'][$campaign['campaign_id']]) ? 'checked' : ''; ?>> <?php echo $campaign['campaign_name']; ?> <br>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input style="cursor: pointer;" type="submit" name="save" value="Save Member Details" /></td>
    </tr>
</table>