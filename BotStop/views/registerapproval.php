<?php if (!defined('APPLICATION')) exit(); ?>
<h1><?php echo T("Apply for Membership") ?></h1>
<div class="Box">
   <?php
   $TermsOfServiceUrl = Gdn::Config('Garden.TermsOfService', '#');
   $TermsOfServiceText = sprintf(T('I agree to the <a id="TermsOfService" class="Popup" target="terms" href="%s">terms of service</a>'), Url($TermsOfServiceUrl));
   // Make sure to force this form to post to the correct place in case the view is
   // rendered within another view (ie. /dashboard/entry/index/):
   echo $this->Form->Open(array('Action' => Url('/entry/register'), 'id' => 'Form_User_Register'));
   echo $this->Form->Errors();
   ?>
   <ul>
      <li>
         <?php
            echo $this->Form->Label('Email', 'Email');
            echo $this->Form->TextBox('Email');
                echo '<span id="EmailUnavailable" class="Incorrect" style="display: none;">'.T('Email Unavailable').'</span>';
         ?>
      </li>
      <li>
         <?php
            echo $this->Form->Label('Username', 'Name');
            echo $this->Form->TextBox('Name');
            echo '<span id="NameUnavailable" class="Incorrect" style="display: none;">'.T('Name Unavailable').'</span>';
         ?>
      </li>
      <li>
         <?php
            echo $this->Form->Label('Password', 'Password');
            echo $this->Form->Input('Password', 'password');
         ?>
      </li>
      <li>
         <?php
            echo $this->Form->Label('Confirm Password', 'PasswordMatch');
            echo $this->Form->Input('PasswordMatch', 'password');
            echo '<span id="PasswordsDontMatch" class="Incorrect" style="display: none;">'.T("Passwords don't match").'</span>';
         ?>
      </li>
      <li class="Gender">
         <?php
            echo $this->Form->Label('Gender', 'Gender');
            echo $this->Form->RadioList('Gender', $this->GenderOptions, array('default' => 'm'))
         ?>
      </li>
        <li>
         <?php
            echo "<br><hr>".$this->Form->Label(T('Humanity Check...  Not bots allowed!'), '');
$q = C('Plugins.BotStop.Question');
                   $num[1] = T("one");
                   $num[2] = T("two");
                   $num[3] = T("three");
                   $num[4] = T("four");
                   $num[5] = T("five");
                   $num[6] = T("six");
                   $num[7] = T("seven");
                   $num[8] = T("eight");
                   $num[9] = T("nine");
                   $frand = rand(1,9);
                   $srand = rand(1,9);
                   $frandname = $num[$frand];
                   $srandname = $num[$srand];
                   $operand = "and";
                 //  $operand = "times";
                   if ($operand == "and") 
                   $answer = $frand + $srand;
                   if ($operand == "times") 
                   $answer = $frand * $srand;
                // show answer
                //  echo "the answer is $answer";
                  echo $this->Form->Hidden('BotResult',array('value' => "$answer"));
                  $q = sprintf(T("How much is %1s %2s %3s?"),$frandname,$operand,$srandname);
            echo $this->Form->Label($q, 'BotCheck');
            echo $this->Form->TextBox('BotCheck');    
         ?> 
            </li>
      <li>
         <?php
            echo $this->Form->Label('Why do you want to join?', 'DiscoveryText');
            echo $this->Form->TextBox('DiscoveryText', array('MultiLine' => TRUE));
         ?>
      </li>
      <li>
         <?php
            echo $this->Form->CheckBox('TermsOfService', $TermsOfServiceText, array('value' => '1'));
         ?>
      </li>
      <li class="Buttons">
         <?php echo $this->Form->Button('Apply for Membership'); ?>
      </li>
   </ul>
   <?php echo $this->Form->Close(); ?>
</div>