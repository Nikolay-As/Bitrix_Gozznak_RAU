<?php

IncludeModuleLangFile( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/options.php" );
IncludeModuleLangFile( __FILE__ );

$arAllOptions = array(
	GetMessage( 'SB_RESERVATION_OPTION_RESERVATION' ),
	[ "reservation_max_per_day", GetMessage( "SB_RESERVATION_MAX_PER_DAY" ), "5", [ "text", 10 ] ],
	GetMessage( 'SB_RESERVATION_OPTION_SECTION_WORK_DAYS' ),
	[ "work_day_monday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_MONDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_tuesday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_TUESDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_wednesday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_WEDNESDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_thursday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_THURSDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_friday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_FRIDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_saturday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_SATURDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_sunday_enabled", GetMessage( "SB_RESERVATION_WORK_DAY_SUNDAY" ), "Y", [ "checkbox", "Y" ] ],
	[ "work_day_dates", GetMessage( "SB_RESERVATION_WORK_DAY_DATES" ), "", [ "textarea", 5, 40 ] ],
	[ "weekend_dates", GetMessage( "SB_RESERVATION_WEEKEND_DATES" ), "", [ "textarea", 5, 40 ] ]
);

$aTabs = [
	[
		"DIV" => "edit1",
		"TAB" => GetMessage( "MAIN_TAB_SET" ),
		"ICON" => "ib_settings",
		"TITLE" => GetMessage( "MAIN_TAB_TITLE_SET" )
	]
];

$request = Bitrix\Main\Context::getCurrent()->getRequest();

if ( $request->isPost() && strlen( $Update . $Apply . $RestoreDefaults ) > 0 && check_bitrix_sessid() ) {
	if ( strlen( $RestoreDefaults ) > 0 ) {
		COption::RemoveOption( "sb.ticket_reservation" );
	} else {
		foreach ( $arAllOptions as $arOption ) {
			if ( ! is_array( $arOption ) ) {
				continue;
			}
			$name = $arOption[0];
			if ( ! isset( $_REQUEST[ $name ] ) ) {
				continue;
			}
			$val = $_REQUEST[ $name ];
			if ( $arOption[3][0] == "checkbox" && $val != "Y" ) {
				$val = "N";
			}
			COption::SetOptionString( "sb.ticket_reservation", $name, $val );
		}
	}
}

$tabControl = new CAdminTabControl( "tabControl", $aTabs );

$currentValues = [];
foreach ( $arAllOptions as $option ) {
	if ( ! is_array( $option ) ) {
		continue;
	}
	$id = $option[0];
	$currentValues[ $id ] = (string) \Bitrix\Main\Config\Option::get( 'sb.ticket_reservation', $id );
}

if ( ! (int) $currentValues["reservation_max_per_day"] ) {
	$currentValues["reservation_max_per_day"] = 5;
}

$tabControl->Begin(); ?>
<form method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= urlencode( $mid ) ?>&amp;lang=<? echo LANGUAGE_ID ?>">
	<? $tabControl->BeginNextTab();
	foreach ( $arAllOptions as $arOption ) {
		if ( ! is_array( $arOption ) ) {
			?>
          <tr class="heading">
          <td colspan="2"><?= htmlspecialcharsbx( $arOption ); ?></td></tr><?
		} else {
			$id = $arOption[0];
			$val = $currentValues[ $id ];
			$type = $arOption[3];
			$controlId = htmlspecialcharsbx( $id );
			?>
          <tr>
            <td width="40%" nowrap <? if ( $type[0] == "textarea" )
				echo 'class="adm-detail-valign-top"' ?>>
				<?
				?><label for="<?= $controlId; ?>"><?= htmlspecialcharsbx( $arOption[1] ); ?></label>
            <td width="60%">
				<?
				switch ( $type[0] ) {
					case "checkbox":
						?><input type="hidden" name="<?= $controlId; ?>" value="N">
                      <input type="checkbox" id="<?= $controlId; ?>" name="<?= $controlId; ?>"
                             value="Y"<?= ( $val == "Y" ? " checked" : "" ); ?>><?
						break;
					case "text":
						?><input type="text" id="<?= $controlId; ?>" name="<?= $controlId; ?>"
                                 value="<?= htmlspecialcharsbx( $val ); ?>" size="<?= $type[1]; ?>" maxlength="255"><?
						break;
					case "textarea":
						?><textarea id="<?= $controlId; ?>" name="<?= $controlId; ?>" rows="<?= $type[1]; ?>"
                                    cols="<?= $type[2]; ?>"><?= htmlspecialcharsbx( $val ); ?></textarea><?
						break;
				}
				?>
            </td>
          </tr>
			<?
		}
	}
	$tabControl->Buttons(); ?>
  <input type="submit" name="Update" value="<?= GetMessage( "MAIN_SAVE" ) ?>"
         title="<?= GetMessage( "MAIN_OPT_SAVE_TITLE" ) ?>" class="adm-btn-save">
  <input type="submit" name="Apply" value="<?= GetMessage( "MAIN_OPT_APPLY" ) ?>"
         title="<?= GetMessage( "MAIN_OPT_APPLY_TITLE" ) ?>">
	<? if ( strlen( $_REQUEST["back_url_settings"] ) > 0 ): ?>
      <input type="button" name="Cancel" value="<?= GetMessage( "MAIN_OPT_CANCEL" ) ?>"
             title="<?= GetMessage( "MAIN_OPT_CANCEL_TITLE" ) ?>"
             onclick="window.location='<? echo htmlspecialcharsbx( CUtil::addslashes( $_REQUEST["back_url_settings"] ) ) ?>'">
      <input type="hidden" name="back_url_settings" value="<?= htmlspecialcharsbx( $_REQUEST["back_url_settings"] ) ?>">
	<? endif ?>
	<?= bitrix_sessid_post(); ?>
	<? $tabControl->End(); ?>
</form>
