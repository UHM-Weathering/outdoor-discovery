<?php
$page_title = "Create Event";

$html = <<<END

<div class="ui container" style="padding-top: 10px">
  <h2 class="ui dividing header" style="text-align: center">Register for {name_placeholder}</h2>
  <div class="ui segment">
    <h3>Event Information</h3>
    <p>Sing, goddess, the anger of Peleus’ son Achilleus
      and its devastation, which put pains thousandfold upon the Achaians,
      hurled in their multitudes to the house of Hades strong souls
      of heroes, but gave their bodies to be the delicate feasting
      of dogs, of all birds, and the will of Zeus was accomplished
      since that time when first there stood in division of conflict
      Atreus’ son the lord of men and brilliant Achilleus. . . .</p>
  </div>
    <form method="post" action="" class="ui form">
        <h4 class="ui dividing header">Registrant Information</h4>
        <div class="field">
          <label>Name</label>
          <div class="four fields">
            <div class="field">
              <input type="text" name="first-name" placeholder="First Name">
            </div>
            <div class="field">
              <input type="text" name="last-name" placeholder="Last Name">
            </div>
            <div class="field">
              <input type="text" name="uh-number" placeholder="UH ID Number">
            </div>
            <div class="field">
              <input type="text" name="email" placeholder="Email Address">
            </div>
          </div>
        </div>
        <div class="field">
          <label>Home Address</label>
          <div class="fields">
            <div class="twelve wide field">
              <input type="text" name="shipping[address]" placeholder="Street Address">
            </div>
            <div class="four wide field">
              <input type="text" name="shipping[address-2]" placeholder="Apt #">
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>State</label>
            <option value="HI">Hawaii</option>
          </div>
          <div class="field">
            <label>Country</label>
              <div class="menu">
                <div class="item" data-value="us"><i class="us flag"></i>United States</div>
              </div>
          </div>
        </div>
        <h4 class="ui dividing header">Billing Information</h4>
        <div class="field">
          <label>Card Type</label>
          <div class="ui selection dropdown">
            <input type="hidden" name="card[type]">
            <div class="default text">Type</div>
            <i class="dropdown icon"></i>
            <div class="menu">
              <div class="item" data-value="visa">
                <i class="visa icon"></i>
                Visa
              </div>
              <div class="item" data-value="amex">
                <i class="amex icon"></i>
                American Express
              </div>
              <div class="item" data-value="discover">
                <i class="discover icon"></i>
                Discover
              </div>
            </div>
          </div>
        </div>
        <div class="fields">
          <div class="seven wide field">
            <label>Card Number</label>
            <input type="text" name="card[number]" maxlength="16" placeholder="Card #">
          </div>
          <div class="three wide field">
            <label>CVC</label>
            <input type="text" name="card[cvc]" maxlength="3" placeholder="CVC">
          </div>
          <div class="six wide field">
            <label>Expiration</label>
            <div class="two fields">
              <div class="field">
                <select class="ui fluid search dropdown" name="card[expire-month]">
                  <option value="">Month</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
              <div class="field">
                <input type="text" name="card[expire-year]" maxlength="4" placeholder="Year">
              </div>
            </div>
          </div>
        </div>
      <div class="ui segment">
        <div class="required inline field">
          <input type="submit" value="Register" class="required ui button"/>
          <div class="ui checkbox">
            <input type="checkbox" tabindex="0" class="hidden">
            <label>I agree to the terms and conditions</label>
          </div>
        </div>
      </div>
    </form>
</div>

END;


?>
