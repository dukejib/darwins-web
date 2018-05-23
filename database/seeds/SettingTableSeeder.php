<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /** Delete All Rows if exists */
        Setting::truncate();

        $refill_text = '<p align=&quot;center&quot;><b>You can send us payment using two methods:

        </b></p><p>1.	By selecting "<b>Bitcoin</b>" option so we can receive your Bitcoins Payments.
        </p><ul><li>Bitcoin
        
        </li></ul><p>2. By selecting "<b>USPS Money Order</b>" option and mailing it to the following address by paying to the order of:
        </p><ul><li>USPS Money Order
        </li></ul><p align="center">        
        <b>Tarik C. Richards
        </b></p><p align="center"><b>More Credit Card Services
        </b></p><p align="center"><b>        22078 Arbor Avenue Suite #234
        </b></p><p align="center"><b>Hayward, California 94541
        
        
        </b></p><p>Whichever method of payment you send us to add value to your African Express VPC Account Wallet, customers must remember to send their refill fee of $3.00 USD and the balance amount they would like on their account simultaneously. For example, if a customer wants to send us $100.00 USD in a USPS Money Order or $100.00 in Bitcoins (<b>BTC</b>) to refill/recharge their African Express VPC Account Wallet, they must remember to send us a total fee of $103.00 USD; otherwise we will automatically deduct that refill fee of $3.00 USD from the balance payment made at the point of customer refill.
        
        </p><p>The idea of Debit Card payments came about as a result of payday loans high interest rate cost and interest on Credit Cards being so high that it became plausible to use your own money. Most merchants do not realize that they are also paying additional percentage fees for being clients of <b>VISA CARD, MASTERCARD, AMERICAN EXPRESS CARD </b>and <b>DISCOVER CARD</b>, <b>PAYPAL</b>, and other major third party gateway processors. These third party gateway fees overtime can cost merchants millions of dollars. Our company <b>More Credit Card Services</b> supports this non-payment of procurement gateway fees and high interest rates so that we can give you the best value for your dollar. So if you spend up to $100.00 USD wherever the African Express VPC is accepted, you will earn <b>10% Cash Back</b> for every $100.00 USD expenditure.</p>';

        $app_text = '<p align="center"><b>For African Express VPC Android App:

        </b></p><p>Before you (<b>Our Customer</b>) place an order for the <b>African Express VPC Android App</b>, you must and we <b>HIGHLY RECOMMEND</b> that you sign-up for a <b>Free ProtonMail Account</b> at <a href="https://protonmail.com/signup" target="_blank">https://protonmail.com/signup</a> for extra privacy and security for our <b>African Express VPC Android App</b>, as <b>Gmail, Yahoo Mail, Hotmail, AOL Mail</b> and <b>Lycos Mail</b> have been known for being under <b>PRISM (surveillance program)</b>. Click on URL to read more about it <a href="https://en.wikipedia.org/wiki/PRISM_(surveillance_program)" target="_blank">https://en.wikipedia.org/wiki/PRISM_(surveillance_program)</a>.Because of this we will never host our <b>African Express VPC Android App</b> on Google Play and we will only send it to registered <b>ProtonMail Accounts</b>.
        
        </p><p align="center"><b>You can send us payment using two methods:

        </b></p><p>1.	By selecting "<b>Bitcoin</b>" option so we can receive your Bitcoins Payments.
        </p><ul><li>Bitcoin
        
        </li></ul><p>2. By selecting "<b>USPS Money Order</b>" option and mailing it to the following address by paying to the order of:
        </p><ul><li>USPS Money Order
</li></ul><p align="center">        
        <b>Tarik C. Richards
        </b></p><p align="center"><b>More Credit Card Services
</b></p><p align="center"><b>        22078 Arbor Avenue Suite #234
        </b></p><p align="center"><b>Hayward, California 94541
        
        
        </b></p><p>Customers who place an order for the <b>African Express VPC Android App </b>has to send a minimum of $12.00 USD in a USPS Money Order or $12.00 in Bitcoins (<b>BTC</b>). Once we have received your payment, our <b>African Express VPC Android App</b> will be sent to your verified registered <b>ProtonMail Account</b>. Furthermore, customers must send their refill fee of $3.00 and the balance amount they would like on their <b>African Express VPC Account Wallet</b> simultaneously. So if a customer places an order for our African Express VPC Android App and wants a $100.00 balance on their <b>African Express VPC Account Wallet</b>, they must send us a total fee $115.00.
        
        </p><p>The idea of Debit Card payments came about as a result of payday loans high interest rate cost and interest on Credit Cards being so high that it became plausible to use your own money. Most merchants do not realize that they are also paying additional percentage fees for being clients of <b>VISA CARD, MASTERCARD, AMERICAN EXPRESS CARD</b> and <b>DISCOVER CARD, PAYPAL</b>, and other major third party gateway processors. These third party gateway fees overtime can cost merchants millions of dollars. Our company <b>More Credit Card Services</b> supports this non-payment of procurement gateway fees and high interest rates so that we can give you the best value for your dollar. So if you spend up to $100.00 USD wherever the African Express VPC is accepted, you will earn <b>10% Cash Back</b> for every $100.00 USD expenditure.
</p><p align="center">        
        
        
        
        <b>For African Express VPC iOS App:
        
        </b></p><p>Before you (<b>Our Customer</b>) place an order for the<b> African Express VPC iOS App</b>, you must and we <b>HIGHLY RECOMMEND</b> that you sign-up for a <b>Free ProtonMail Account</b> at <a href="https://protonmail.com/signup" target="_blank">https://protonmail.com/signup</a> for extra privacy and security for our <b>African Express VPC iOS App</b>, as <b>Gmail, Yahoo Mail, Hotmail, AOL Mail</b> and <b>Lycos Mail</b> have been known for being under <b>PRISM (surveillance program)</b>. Click on URL to read more about it <a href="https://en.wikipedia.org/wiki/PRISM_(surveillance_program)" target="_blank">PRISM_(surveillance_program)</a>. Because of this we will never host our <b>African Express VPC iOS App</b> at the Apple Store and we will only send it to registered <b>ProtonMail Accounts</b>.
        
        </p><p align="center"><b>You can send us payment using two methods:
</b>        
        </p><p>1.	By selecting "<b>Bitcoin</b>" option so we can receive your Bitcoins Payments.
        </p><ul><li>Bitcoin
        
        </li></ul><p>2. By selecting "<b>USPS Money Order</b>" option and mailing it to the following address by paying to the order of:
        </p><ul><li>USPS Money Order
</li></ul><p align="center">        
        <b>Tarik C. Richards
        </b></p><p align="center"><b>More Credit Card Services
</b></p><p align="center"><b>        22078 Arbor Avenue Suite #234
        </b></p><p align="center"><b>Hayward, California 94541
        
        
        </b></p><p>Customers who place an order for the <b>African Express VPC iOS App </b>has to send a minimum of $12.00 USD in a USPS Money Order or $12.00 in Bitcoins (<b>BTC</b>). Once we have received your payment, our <b>African Express VPC iOS App </b>will be sent to your verified registered <b>ProtonMail Account</b>. Furthermore, customers must send their refill fee of $3.00 and the balance amount they would like on their <b>African Express VPC Account Wallet</b> simultaneously. So if a customer places an order for our <b>African Express VPC iOS App</b> and wants a $100.00 balance on their <b>African Express VPC Account Wallet</b>, they must send us a total fee $115.00.
        
        </p><p>The idea of Debit Card payments came about as a result of payday loans high interest rate cost and interest on Credit Cards being so high that it became plausible to use your own money. Most merchants do not realize that they are also paying additional percentage fees for being clients of <b>VISA CARD, MASTERCARD, AMERICAN EXPRESS CARD</b> and <b>DISCOVER CARD,</b> <b>PAYPAL</b>, and other major third party gateway processors. These third party gateway fees overtime can cost merchants millions of dollars. Our company <b>More Credit Card Services</b> supports this non-payment of procurement gateway fees and high interest rates so that we can give you the best value for your dollar. So if you spend up to $100.00 USD wherever the African Express VPC is accepted, you will earn <b>10% Cash Back</b> for every $100.00 USD expenditure.</p>';
        
        Setting::create([
            'site_name' => 'More Credit Card Services',
            'address_line1' => 'MORE CREDIT CARD SERVICES',
            'address_line2' => '22078 Arbor Avenue Suite #234',
            'address_line3' => 'Hayward, California 94541',
            'contact_line1' => '510-491-3264',
            'contact_line2' => '510-921-7366',
            'contact_mobile' => '510-887-0993',
            'contact_email' => 'mailman@morecreditcardservices.com',
            'tos_filename' => 'tos.pdf',
            'refill_statement' => $refill_text,
            'app_statement' => $app_text,
            'apikey' => 'a4b884f4-d61a-4cb1-b407-b9936122aa24',
            'xpub' => 'xpub6C1pvtLR2uzM36Bq3AToYKi9q3FJJ4vYu5kLaZc7phSDsfhXr1xQu3pSAquTrSuTiu8JpoPyRZmUghLYrNv8pPiE6ENPo3AdD79U2boQiQH'
        ]);
        $this->command->info('Settings Seeded');
    }
}
