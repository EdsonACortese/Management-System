<script src="<?= base_url('assets/plugins/math.min.js') ?>"></script>
<div class="selected-page">
    <div class="inner">
        <h1>
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
            <?= lang('create_invoice') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
    <div class="border"></div>
</div>
<form action="" id="setInvoiceForm" class="site-form" method="POST">
    <div>
        <select class="selectpicker" name="invoice_translation" title="<?= lang('choose_translation') ?>">
            <option value="0" selected=""><?= lang('default_inv_lang') ?></option>
            <?php
            if (!empty($invoiceLanguages)) {
                foreach ($invoiceLanguages as $invLanguage) {
                    ?>
                    <option value="<?= $invLanguage['id'] ?>"><?= $invLanguage['language_name'] ?></option>
                    <?php
                }
            }
            ?> 
        </select>
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modalAddNewTranslation" class="btn btn-default">
            <?= lang('add_new_inv_translation') ?>
        </a>
        <a href="<?= lang_url('user/settings/invoices') ?>" class="btn btn-default pull-right">
            <?= lang('invoice_settings') ?>
        </a>
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modalExplainTranslation">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </a>
    </div> 
    <div class="new-invoice">
        <div class="type">
            <label><?= lang('create_inv_type') ?></label> 
            <div class="special-radio">
                <label class="control control--radio"><?= lang('create_inv_proforma') ?>
                    <input type="radio" value="prof" name="inv_type"/>
                    <div class="control__indicator"></div>
                </label>
                <label class="control control--radio"><?= lang('create_inv_invoice') ?>
                    <input type="radio" value="tax_inv" name="inv_type" checked="checked"/>
                    <div class="control__indicator"></div>
                </label>
                <label class="control control--radio"><?= lang('create_inv_debit') ?>
                    <input type="radio" value="debit" name="inv_type"/>
                    <div class="control__indicator"></div>
                </label>
                <label class="control control--radio"><?= lang('create_inv_credit') ?>
                    <input type="radio" value="credit" name="inv_type"/>
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div>
        <div class="inner"> 
            <h1 class="inv-type-title"><?= lang('invoice') ?></h1>
            <div class="row credit-debit-option">
                <div class="col-sm-5">
                    <div class="column-data">
                        <label><?= lang('to_inv_num') ?></label>
                        <input class="form-control field" name="to_inv_number" type="text">
                    </div>
                    <div class="column-data">
                        <label><?= lang('to_inv_date') ?></label>
                        <input class="form-control field datepicker" name="to_inv_date" placeholder="dd.mm.yyyy" type="text">
                    </div>
                </div> 
            </div>
            <div class="row head-content">
                <div class="col-sm-6 col-md-5">
                    <div class="column-data client">
                        <label><?= lang('create_inv_client') ?></label> 
                        <input type="text" name="client_name" class="form-control field">
                        <a href="" class="choose">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span><?= lang('create_inv_choose') ?></span>
                        </a> 
                        <div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="is_to_person" id="individual-client" value=""><?= lang('create_inv_individual') ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="column-data client client-company"> 
                        <label><?= lang('create_inv_bulstat') ?></label> 
                        <input type="text" name="client_bulstat" class="form-control field">
                        <a href="" class="choose">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span><?= lang('create_inv_choose') ?></span>
                        </a>
                        <div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="client_vat_registered" id="client-vat-registered" value=""><?= lang('create_inv_client_vat_registered') ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="column-data client-company client-vat-registered">
                        <label><?= lang('create_inv_vat_number') ?></label>
                        <input type="text" class="form-control field">
                    </div>
                    <div class="column-data client-company">
                        <label><?= lang('create_inv_mol') ?></label>
                        <input type="text" class="form-control field">
                    </div>
                    <div class="column-data client-individial">
                        <label><?= lang('create_inv_ident_num') ?></label>
                        <input type="text" name="client_ident_num" class="form-control field">
                    </div>
                    <div class="column-data">
                        <label><?= lang('create_inv_city') ?></label>
                        <input type="text" name="client_city" class="form-control field">
                    </div>
                    <div class="column-data">
                        <label><?= lang('create_inv_address') ?></label>
                        <input type="text" name="client_address" class="form-control field">
                    </div>
                    <div class="column-data">
                        <label><?= lang('create_inv_country') ?></label>
                        <input type="text" name="client_country" class="form-control field">
                    </div>
                    <div class="column-data client-company">
                        <label><?= lang('create_inv_recipient') ?></label> 
                        <input type="text" name="recipient_name" class="form-control field"> 
                    </div>
                </div>
                <div class="col-sm-6 col-md-7">
                    <div class="invoice-setting">
                        <div class="column-data">
                            <span class="inv-type-num"><?= lang('create_inv_inv_num') ?></span> <label>№:</label>
                            <input type="text" name="inv_number" value="<?= $nextInvNumber ?>" class="form-control field">
                        </div>
                        <div class="column-data">
                            <label><?= lang('create_inv_date_create') ?></label>
                            <input type="text" name="date_create" placeholder="dd.mm.yyyy" value="<?= date('d.m.Y', time()) ?>" class="form-control field datepicker">
                        </div>
                        <div class="column-data">
                            <label><?= lang('create_inv_date_tax') ?></label>
                            <input type="text" name="date_tax_event" placeholder="dd.mm.yyyy" value="<?= date('d.m.Y', time()) ?>" class="form-control field datepicker">
                        </div>
                        <div class="column-data">
                            <div class="checkbox">
                                <label><input type="checkbox" name="have_maturity_date" id="maturity-date" value=""><?= lang('create_inv_i_maturity_date') ?></label>
                            </div>
                            <div class="maturity-date">
                                <label><?= lang('create_inv_maturity_date') ?></label>
                                <input type="text" placeholder="dd.mm.yyyy" value="<?= date('d.m.Y', time()) ?>" name="maturity_date" class="form-control field datepicker">
                            </div>
                        </div>
                        <div class="column-data">
                            <div class="checkbox">
                                <label><input type="checkbox" name="cash_accounting" value=""><?= lang('create_inv_cash_acc') ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-currency">
                <?= lang('select_curreny') ?> 
                <select class="selectpicker" id="selectCurrencyNewInv" name="inv_currency" title="<?= lang('no_currency_selected') ?>" data-live-search="true">
                    <?php
                    foreach ($currencies as $currency) {
                        if ($myDefaultFirmCurrency == $currency['value']) {
                            $selectedCurrency = 'selected';
                        } else {
                            $selectedCurrency = '';
                        }
                        ?>
                        <option value="<?= $currency['value'] ?>" <?= $selectedCurrency ?>><?= $currency['name'] ?></option>
                    <?php } if ($selectedCurrency == '') { ?>
                        <option value="EUR" selected="">EUR</option>
                    <?php } ?>
                </select>
            </div>
            <div class="table-responsive">
                <table class="table table-items">
                    <thead>
                        <tr>
                            <th></th>
                            <th><?= lang('create_inv_item') ?></th>
                            <th><?= lang('create_inv_quantity') ?></th>
                            <th><?= lang('create_inv_price') ?></th>
                            <th class="text-right"><?= lang('create_inv_total') ?></th>
                        </tr>
                    </thead>
                    <tbody class="body-items">
                        <tr>
                            <td>
                                <div class="actions">
                                    <a href="javascript:void(0);" class="btn btn-default delete-item" data-my-message="<?= lang('sure_want_to_del_item') ?>">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-default move-me">
                                        <i class="fa fa-sort" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <input type="text" value="" name="items_names[]" class="form-control field field-item-name">
                                <a href="" class="choose">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    <span><?= lang('create_inv_choose') ?></span>
                                </a>
                            </td>
                            <td>
                                <input type="text" value="0.00" name="items_quantities[]" class="form-control field quantity-field">
                                <div class="quantity-type">
                                    <select class="form-control" name="items_quantity_types[]" data-my-id="1">
                                        <?php foreach ($quantityTypes as $quantityType) { ?>
                                            <option value="<?= $quantityType['name'] ?>"><?= $quantityType['name'] ?></option>
                                        <?php } ?>
                                        <option value="--">--</option>
                                        <option value="createNewQuantity"><?= lang('create_new_quantity') ?></option>
                                    </select> 
                                </div>
                                x
                            </td>
                            <td>
                                <input type="text" value="0.00" name="items_prices[]" class="form-control field price-field">
                                =
                            </td>
                            <td class="text-right">
                                <div class="item-total-price">
                                    <span class="item-total">0.00</span> 
                                    <span class="currency-text">
                                        <?= $myDefaultFirmCurrency != null ? $myDefaultFirmCurrency : 'EUR' ?>
                                    </span>
                                    <input type="hidden" class="item-total" value="0.00" name="items_totals[]">
                                </div>
                            </td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div class="items-features">
                <a href="javascript:void(0);" class="add-new-item">
                    <i class="fa fa-plus"></i>
                    <?= lang('add_new_item_to_table') ?>
                </a>
            </div>
            <div class="row amounts">
                <div class="col-sm-12 col-md-6 col-md-offset-6">
                    <div class="row amount-row">
                        <div class="col-sm-6">
                            <?= lang('create_inv_invoice_amount') ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="amount">
                                <span id="items-total">0.00</span> 
                                <input type="hidden" value="0.00" name="invoice_amount" class="items-total">
                                <span class="currency-text">
                                    <?= $myDefaultFirmCurrency != null ? $myDefaultFirmCurrency : 'EUR' ?>
                                </span>
                            </div> 
                        </div>
                    </div>
                    <div class="row amount-row">
                        <div class="col-sm-6">
                            <div class="discount-txt">
                                <?= lang('create_inv_discount') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="discount">
                                <input type="text" value="0.00" name="discount" class="form-control field text-discount">
                                <div class="select-discount">
                                    <select class="selectpicker form-control" name="discount_type" id="discount-value"> 
                                        <option class="currency-text"><?= $myDefaultFirmCurrency != null ? $myDefaultFirmCurrency : 'EUR' ?></option>
                                        <option>%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row amount-row">
                        <div class="col-sm-6">
                            <?= lang('create_inv_tax_base') ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="amount">
                                <span id="tax-base">0.00</span>
                                <input type="hidden" value="" name="tax_base" class="tax-base">
                                <span class="currency-text">
                                    <?= $myDefaultFirmCurrency != null ? $myDefaultFirmCurrency : 'EUR' ?>
                                </span>
                            </div> 
                        </div>
                    </div>
                    <div class="row amount-row">
                        <div class="col-sm-6">
                            <div class="no-vat-container">
                                <?= lang('create_inv_vat') ?>
                                <input type="text" class="form-control field vat-field" name="vat_percent" value="20">
                                %
                            </div>
                            <div class="no-vat">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="no_vat" id="no-vat" value=""><?= lang('create_inv_no_vat_mark') ?></label>
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-6"> 
                            <div class="amount the-vat">
                                <span id="vat-sum">0.00</span> 
                                <input type="hidden" name="vat_sum" value="0.00" class="vat-sum">
                                <span class="currency-text">
                                    <?= $myDefaultFirmCurrency != null ? $myDefaultFirmCurrency : 'EUR' ?>
                                </span>
                            </div> 
                            <div class="no-vat-field">
                                <label><?= lang('create_inv_reason_no_vat') ?></label>
                                <input type="text" name="no_vat_reason" class="form-control field">
                                <a href="" class="choose">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    <span><?= lang('create_inv_choose') ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row amount-row total-row">
                        <div class="col-sm-6">
                            <span class="total"><?= lang('create_inv_total') ?></span> 
                        </div>
                        <div class="col-sm-6">
                            <div class="amount total">
                                <span id="final-total">0.00</span>
                                <input type="hidden" name="final_total" class="final-total" value="0.00">
                                <span class="currency-text">
                                    <?= $myDefaultFirmCurrency != null ? $myDefaultFirmCurrency : 'EUR' ?>
                                </span>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="remarks">
                <label><?= lang('create_inv_remarks') ?><sup><?= lang('visibile_for_client') ?></sup></label>
                <textarea class="form-control field area" name="remarks"></textarea>
            </div>
            <div class="payment-type">
                <label><?= lang('create_inv_payment_type') ?></label>
                <select class="selectpicker payment-method" name="payment_method">
                    <?php foreach ($paymentMethods as $paymentMethod) { ?>
                        <option value="<?= $paymentMethod['name'] ?>"><?= $paymentMethod['name'] ?></option>
                    <?php } ?> 
                    <option value="--">--</option>
                    <option value="createNewMethod"><?= lang('create_new_pay_method') ?></option>
                </select> 
            </div> 
        </div>
        <input type="hidden" value="0" name="is_draft">
        <a href="javascript:void(0);" onclick="createNewInvValidate()" class="btn btn-green"><?= lang('create_inv_save') ?></a>
        <a href="javascript:void(0);" onclick="createDraft()" class="btn btn-orange"><?= lang('create_inv_save_draft') ?></a>
        <?= lang('or') ?>
        <a href="<?= lang_url('user/invoices') ?>"><?= lang('open_invoices') ?></a>
    </div>
</form>
<!-- Modal Add New Quantity Type -->
<div class="modal fade" id="addQuantityType" tabindex="-1" role="dialog" aria-labelledby="addQuantityType">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?= lang('add_new_quantity_type') ?></h4>
            </div>
            <div class="modal-body site-form">
                <input type="text" value="" placeholder="<?= lang('type_quantity_type') ?>" class="form-control field new-quantity-value">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>
                <button type="button" class="btn btn-primary add-my-new-quantity-type"><?= lang('add_the_quantity') ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Payment Method -->
<div class="modal fade" id="addPaymentMethod" tabindex="-1" role="dialog" aria-labelledby="addPaymentMethod">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?= lang('add_new_payment_method') ?></h4>
            </div>
            <div class="modal-body site-form">
                <input type="text" value="" placeholder="<?= lang('type_payment_method') ?>" class="form-control field my-new-pay-method">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>
                <button type="button" class="btn btn-primary add-my-new-pay-method"><?= lang('add_the_pay_method') ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Explain Add Translations -->
<div class="modal fade" id="modalExplainTranslation" tabindex="-1" role="dialog" aria-labelledby="modalExplainTranslation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?= lang('what_mean_new_translate') ?></h4>
            </div>
            <div class="modal-body">
                <?= lang('what_mean_new_translate_explain') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button> 
            </div>
        </div>
    </div>
</div>
<!-- Modal Create New Translation -->
<div class="modal fade" id="modalAddNewTranslation" tabindex="-1" role="dialog" aria-labelledby="modalAddNewTranslation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?= lang('add_new_translation') ?></h4>
            </div>
            <div class="modal-body site-form">
                <form method="POST" action="" id="formAddNewTranslate">
                    <input type="hidden" name="addNewInvoiceLanguage" value="1">
                    <div class="form-group">
                        <label><?= lang('trans_language_name') ?></label>
                        <input type="text" name="language_name" placeholder="<?= lang('lang_name_internal_use') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_recipient') ?></label>
                        <input type="text" name="recipient" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_bulstat') ?></label>
                        <input type="text" name="bulstat" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_mol') ?></label>
                        <input type="text" name="mol" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_sender') ?></label>
                        <input type="text" name="sender" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_original') ?></label>
                        <input type="text" name="original" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_number') ?></label>
                        <input type="text" name="number" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_date_of_issue') ?></label>
                        <input type="text" name="date_of_issue" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_to_an_invoice') ?></label>
                        <input type="text" name="a_date_of_a_tax_event" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_invoice') ?></label>
                        <input type="text" name="invoice" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_debit_note') ?></label>
                        <input type="text" name="debit_note" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_credit_note') ?></label>
                        <input type="text" name="credit_note" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_remarks') ?></label>
                        <input type="text" name="remarks" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_pro_forma') ?></label>
                        <input type="text" name="pro_forma" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_products_name') ?></label>
                        <input type="text" name="products_name" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_quantity') ?></label>
                        <input type="text" name="quantity" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_single_price') ?></label>
                        <input type="text" name="single_price" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_value') ?></label>
                        <input type="text" name="value" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_amount') ?></label>
                        <input type="text" name="amount" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_tax_base') ?></label>
                        <input type="text" name="tax_base" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_percentage_vat') ?></label>
                        <input type="text" name="percentage_vat" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="from-group">
                        <label><?= lang('trans_vat_charget') ?></label>
                        <input type="text" name="vat_charget" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_everything') ?></label>
                        <input type="text" name="everything" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_reason_non_var') ?></label>
                        <input type="text" name="reason_for_non_vat" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_compiled') ?></label>
                        <input type="text" name="compiled" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_signature') ?></label>
                        <input type="text" name="signature" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                    <div class="form-group">
                        <label><?= lang('trans_schiffer') ?></label>
                        <input type="text" name="schiffer" placeholder="<?= lang('your_translation') ?>" value="" class="form-control field field-new-translate">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-default" onclick="saveNewTranslation()"><?= lang('save_new_translate') ?></a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button> 
            </div>
        </div>
    </div>
</div>
<script>
    var createInv = {
        rountTo: <?= $opt_inv_roundTo ?>
    };
</script>