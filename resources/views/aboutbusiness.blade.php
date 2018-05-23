@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')


        <div class="panel panel-primary">
            <div class="panel-heading">About Business</div>
            <div class="panel-body">

                <div class="page-header">
                    <h3>How Do You and Your Business Stack Up?
                    <br>
                    <small>Self-Diagnostic Assessment Test</small>
                    </h3>
                </div>

                <p class="lead"> Dear Business Owner:</p>

                <p class="text-justify">A lot of people fixate on the abstract concept of trying to work &quot;on&quot; their business, instead of &quot;in&quot; it.
                    I&apos;m a more direct and logical thinker. I&apos;ve always tried to figure out how to get a business to work harder for its owner than he or she worked for it.<i> A simple difference perhaps </i>. But a major difference, nonetheless.
                </p>

                <p class="text-justify">With my driving thought always being how many ways I can help get your business working harder
                    and better for you --- I&apos;ve created an 112-question, self-diagnostic assessment test called <strong>&quot;How Do
                        You And Your Business Stack Up?&quot;</strong> It asks some very straightforward, <strong>(yet highly revealing)</strong> questions designed to instantly detect whether or not your business could --- and should --- be working harder and more profitably for you --- And if so, precisely where you have the most room for improvement.
                </p>

                <p class="text-justify">I invite you to sit down right now and go through the 112 questions on this test --- the answers and their business/financial implications to you will be self-evident. Once you&apos;ve completed all 112 questions, see where you stand <strong>(see self-diagnostic interpretation section at the end)</strong>. If your total points exceed <strong>194</strong> or higher, congratulations! You&apos;re a very fine marketer already and should feel good about where you&apos;ve come, so far.</p>

                <p class="text-justify">If your total points equal 35 or less, it tells you that your marketing is very weak, your opportunity for growth and greater profitability with a better marketing strategy to follow IS ALMOST ASSURED. You are probably realizing less than 15% of your real business/financial/marketing potential.</p>

                <p class="text-justify">It&apos;s a shame to see promising businesses under-perform their capability to deliver more income, certainty, profits and wealth to their owners --- if it&apos;s easily doable. Frequently, merely shifting the marketing you do, the strategy you follow and/or the money-making system you implement can double, re-double and even re-double -- again -- the income and profits your business delivers to you.</p>

                <p class="text-justify">I created this self-diagnostic assessment test to see whether or not your business could be --- and should be --- delivering more pay-off for you. I&aposll be interested in the conclusion you come up with after reading the diagnostic scale at the end of the test.</p>
                <br>

            </div>

            <div class="container">
                {{-- Form stuff--}}
                {{--<form class="form-horizontal" id="myform" name="myform">--}}

                {{--<div class="form-group">--}}

                <p class="text-justify">Here now are the 112 questions to answer. Be candid with yourself; since you alone will know the exact answers and their profit implications.</p>

                <p class="text-justify"><strong>1.</strong> How many different selling methods do you currently do/use?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que1" value="1">1 (1pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que1" value="2">2-4 (2pts) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que1" value="3">5 or more (3pts)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>2.</strong> How many new potential selling methods have you tested in the last 12 months?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que2" value="0">None (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que2" value="1">1 (1pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que2" value="2">2-4 (2pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que2" value="4">5 or more (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>3.</strong> Do you have a keen handle on all you marginal net worth factors for all three ways to grow clients and for each segment of separate product line you market? </p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que3" value="0">None (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que3" value="1">A Few (1pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que3" value="2">Most (2pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que3" value="4">All (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>4.</strong> How many formalized, referral generating systems do you have working right now that everyone in your enterprise with Buyer Contacts uses and follows?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que4" value="0">None (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que4" value="1">1 (1pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que4" value="2">2-5 (2pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que4" value="4">6 or more (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>5.</strong> Is your business being marketed tactically or strategically?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que5" value="0">Tactically (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que5" value="2">Strategically (2pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>6.</strong> Do you have a powerful USP <strong>(Unique Selling Proposition)</strong><br>
                 that comes across to the market you target as being the only viable solution to a problem they have that you alone verbalized for them or an opportunity you alone identified?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que6" value="0">No (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que6" value="2">Yes (2pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>7.</strong> Do you know what your attrition rate is and why they stop buying from you?  </p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que7" value="0">No (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que7" value="1"> Partially (1pt)  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que7" value="3"> Yes, in both cases (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>8.</strong> Do you have attrition reduction or client conservation programs in place to minimize inactive buyers? <br></p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que8" value="0">No (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que9" value="2"> Yes(2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>9.</strong> Do you have comprehensive databases of your prospects and buyers that identifies everything from names, contact numbers, type of buying,
                <br> what they buy, what they didn&apos;t buy, 
                where they originated from, quantities of past purchases, etc.</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que9" value="0">No (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que9" value="1">Partial (1 pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que9" value="3"> Yes On All Issues (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>10.</strong> Do you actively use all the data above to target different categories of prospects/buyers in different ways for different products or services?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que10" value="0">No (0pt) &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que10" value="3"> Yes (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>11.</strong> Do you know exactly where all <strong>(or at least most)</strong> of your business is coming from and how to stimulate more people from those specific sources to purchase from you?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que11" value="0">No (0pt)  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que11" value="2">Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>12.</strong> Do you know where your biggest source of untapped new business is and how to ultimately mine it? </p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que12" value="0">No (0pt)  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        <input type="radio" name="que12" value="2">Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>13.</strong> Does at least 25% of your business currently come from referrals?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que13" value="0" >No (0pt)  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que13" value="2" >Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>14.</strong> Is the average number of referrals you get every month going up or down? Growing or dropping? </p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que14" value="0" >Down/Dropping (0pt)  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que14" value="2" >Up/Growing (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>15.</strong> Do you have a reliable system of collecting and creating client testimonials and success stories?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que15" value="0" >No (0pt)  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="que15" value="2" >Yes (2pt)
                    </label>
                </div>
                <br>


                <p class="text-justify"><strong>16.</strong> If yes, how many client testimonials and success stories do you have?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que16" value="1" >1-5 (1pt) &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        <input type="radio" name="que16" value="2" >6-10 (2pt)  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        <input type="radio" name="que16" value="3" >11-20 (3pt) &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        <input type="radio" name="que16" value="4" >21 & over (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>17.</strong> Do you effectively and powerfully use your testimonials in all the marketing, advertising and sales efforts you do?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="que17" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que17" value="1" >  Sometimes (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que17" value="3" >  Yes, always (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>18.</strong> Do you have respected people in your field, market, industry who unheedingly endorse you and your company?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que18" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que18" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>19.</strong> How many endorsements do you have?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que19" value="0" >  None (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que19" value="1" >  1-3 (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que19" value="2" >  4-9 (2pt)   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que19" value="3" >  10 or above (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>20.</strong> Do you have a continuous system/approach program actively in place to continually secure more prominent endorsement?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que20" value="0" > No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que20" value="2" > Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>21.</strong> Do you have any strategic alliances/host beneficiary relationships actively in place right now?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que21" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que21" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>22.</strong> If yes, how many strategic alliances/host beneficiary relationships are you currently doing promotions with right now?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que22" value="1" >  One (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que22" value="2" >  2-5 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que22" value="3" >  6-10 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que22" value="4" >  10 or more (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>23.</strong> Are you adding host beneficiary endorsements <strong>(i.e., complementary businesses, publications, associations)</strong> to your marketing mix every quarter?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que23" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que23" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>24.</strong> If yes, how many <strong>(on average)</strong> are you adding to your marketing mix every quarter?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que24" value="1" >  1 (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que24" value="2" >  2-3 (2pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que24" value="3" >  4-9 (3pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que24" value="4" >  10 or more (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>25.</strong> Do you repeatedly test headlines or their equivalent<br> <strong>(i.e., opening sentence of your presentations, phone-in sales calls, telemarketing scripts, greeting at trade shows, etc.)</strong></p>
                <div class="radio"> <label>
                        <input type="radio" name="que25" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que25" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>
                <p class="text-justify"><strong>26.</strong> If yes, how many different headlines or equivalent have you successfully tested in the last 12 months?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que26" value="1" >  1 (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que26" value="2" >  2-9 (2pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que26" value="3" >  10-20 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que26" value="4" >   21 or more (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>27.</strong> Do you have a systematic, ongoing follow-up system you follow and put into action for every prospect and first time buyer you acquire?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que27" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que27" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>28.</strong> How often do you follow up to past buyers/clients by phone, mail, e-mail or in-person?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que28" value="0" >  Never (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que28" value="1" >  Once Every Six Months (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que28" value="2">  Once A Quarter (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que28" value="3">  More Often (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>29.</strong> Do you know your allowable cost of acquiring a new prospect and/or clients and if &quot;yes&quot;,<br> do you invest up to that amount in your marketing efforts to acquire new buyers? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que29" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que29" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>30.</strong> Do you have a progressive backend; meaning, you keep logically either reselling clients ongoing quantities of your basic products/services or 
                <br>you keep adding new additional backend products or services to the sales cycle.  </p>
                <div class="radio"> <label>
                        <input type="radio" name="que30" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que30" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>31.</strong> If yes, how many different progressive, backend products do you offer?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que31" value="1" >  1-2 (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que31" value="2" >  3-9 (2pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que31" value="3" >  10 or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>32.</strong> Do you spend more of your time on marketing or managing?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que32" value="0" >  Never (0pt)   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que32" value="1" >  Once Every Six Months (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que32" value="2" >  Once A Quarter (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que32" value="3" >  More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>33.</strong> Do you believe Peter Drucker&apos;s quote that; 
                <blockquote>&quot;Marketing and innovation are the two things that create customers and profits; everything else is an expense?&quot;</blockquote></p>
                <div class="radio"> <label>
                        <input type="radio" name="que33" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que33" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>34.</strong> Do you use risk reversal to close sales and differentiate your business from your competitors?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que34" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que34" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>35.</strong> If yes, how many different ways have you tested reversing the risk?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que35" value="0" >  None (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que35" value="1" >  1 (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que35" value="2" >  2-4 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que35" value="3" >  5 or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>36.</strong> How many of these key, marketing factors do you regularly test?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que36" value="0" >  Nothing (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que36" value="1" >  Just Headlines (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que36" value="2" >  Headlines, Offers (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que36" value="3" >  Headlines, Offers and Guarantees/Risk Reversals (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>37.</strong> Do you offer bonuses <strong>(either tangible or intangible)</strong> as an incentive to purchase your product or service now?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que37" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que37" value="2" >  Yes (2pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>38.</strong> How much of a difference have your tests made on either your results/response/profit?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que38" value="1" >  Less than 10% Improvement (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que38" value="2" >  11-30% (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que38" value="3" >  31-50% (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que38" value="4" >  51-99% (4pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que38" value="5" >  100% (double) or Higher (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>39.</strong> Do you do PR/media relationships/radio/newspaper/magazine interviews?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que39" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que39" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>40.</strong> Do you use the results of these activities in excerpts or reproductions as part of your marketing?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que40" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que40" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>41.</strong> Do you write articles, special reports or a book(s) you use for promotional positioning?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que41" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que41" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>42.</strong> Do you have a prime prospect list or lists you market to by direct mail, e-mail, telemarketing, catalog or sales personnel?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que42" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que42" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>43.</strong> Do you know what your return on investment is for Lead/Prospect Generating, Lead Generating and Sales Conversion and/or Reselling Buyers?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que43" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que43" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>44.</strong> Do you have a continuous way to build a growing prospect/client e-mail list?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que44" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que44" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>45.</strong> How often do you send quality e-mails out that provide a benefit to your clients and/or prospects?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que45" value="0" >  Never (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que45" value="1" >  Infrequently (1pt)   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que45" value="2" >  Quarterly (2pt)    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que45" value="3" >  Monthly or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>46.</strong> Are your e-mails, educational/contact-based and not merely self-serving?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que46" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que46" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>47.</strong> Do you have a direct response-formatted website that is built around my marketing principles?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que47" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que47" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>48.</strong> Do you do effective <strong>(meaning successful at both attracting and then converting)</strong>
                <br>search engine optimization that builds more prospects, buyers, business?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que48" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que48" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>49.</strong> Do you have a Power Parthenon of different marketing activities in place where prospects/clients/revenue flow in from multiple profit pillars/streams?
                <br> If yes, how many pillars in your Power Parthenon? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que49" value="1" >  2 (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que49" value="2" >  3-5 (2pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que49" value="3" >  6-8 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que49" value="4" >  9 or More (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>50.</strong> Do you have a target prospect list of strategic partners - i.e., companies that either already have a strong relationship with the same people you want to sell<br>
                --or new, competitive organizations that have more to gain then even you do by seeing you sell your product/service to more people/companies.</p>
                <div class="radio"> <label>
                        <input type="radio" name="que50" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que50" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>51.</strong> If yes, how many prospective, new <strong>"strategic partner"</strong> companies <strong>(with complete contact data)</strong> are there on that list?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que51" value="1" >  1-5 (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que51" value="2" >  6-10 (2pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que51" value="3" >  11-20 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que51" value="4" >  21-50 (4pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que51" value="5" >  51 and Over (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>52.</strong> Have you and all your people who have contact with your prospects/buyers had formalized strategic consultative/advisory sales training? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que52" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que52" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>53.</strong> If yes, how often do you retrain and advance their skills in this all-important revenue-generating factor? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que53" value="0" >  Never Again (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que53" value="1" >  Yearly or Longer (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que53" value="2" >  Every Six Months (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que53" value="3" >  Monthly (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>54.</strong> How many competitive advantages have you created for your business?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que54" value="0" > None (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que54" value="1" > One (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que54" value="2" >  2-5 (2pt)   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que54" value="3" >  6 or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>55.</strong> Do you have successful ways to acquire new clients/buyers at a breakeven and that makes your real profit on the backend?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que55" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que55" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>56.</strong> If yes, how many different approaches do you use? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que56" value="1" > One (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que56" value="2" >  2-3 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que56" value="3" >  4 or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>57.</strong> Do you regularly educate and update your prospects and clients?  </p>
                <div class="radio"> <label>
                        <input type="radio" name="que57" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que57" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>58.</strong>  How many prospect lists have you located and use that better target your best defined prospects?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que58" value="0" >  None (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que58" value="1" >  One (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que58" value="2" >  2-5 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que58" value="3" >  6-10 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que58" value="4" >  11 or More (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>59.</strong> Do you really think your marketing makes irresistible offers to your prospects?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que59" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que59" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>60.</strong> If no, how many ways can you come up with right now to strengthen the appeal, attractiveness, effectiveness of your sales, advertising, promotional offers and propositions?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que60" value="1" >  One (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que60" value="2" >  2-5 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que60" value="3" >  6-10 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que60" value="4" >  More than 10 (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>61.</strong> How may more complementary <strong>(up-sell/cross-sell)</strong> products/services do you currently add to your sales proposition?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que61" value="0" >  None (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que61" value="1" >  One (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que61" value="2" >  2-5 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que61" value="3" >  6 or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>62.</strong> Do you offer buyers greater/larger units/quality product to increase the size of each sale?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que62" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que62" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>63.</strong> If no, how many possibilities can you come up with right now for doing this?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que63" value="0" >  None (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que63" value="1" >  One (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que63" value="2" >  2-5 (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que63" value="3" >  6 or More (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>64.</strong> Do you endorse or do joint ventures with other companies to sell THEIR products/service to YOUR buyers and prospects?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que64" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que64" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>65.</strong> Do you hold, run, or do special events such as seminars, new product introductions, end of year promotions, close out promotion, 
                <br>private sales, meet the management events, meet the manufacturer events, meet the creator-type events, etc.?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que65" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que65" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>66.</strong> Do you ethically <strong>(but effectively)</strong> prepare buyers from their very first purchasing experience with you to keep coming back to purchase over and over again? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que66" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que66" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>67.</strong> Do YOU personally talk to your buyers, prospects, and clients regularly to learn what they want and then build a relationship with them? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que67" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que67" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>68.</strong> Do you regularly shop/buy from your competitors to see what they do differently or are doing that your company doesn&amps;t do? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que68" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que68" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>69.</strong> There are between 15 and 30 key impact or leverage points that can positively increase your business sales/profit performance. How many have you identified?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que69" value="0" >  None (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que69" value="1" >  1-5 (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que69" value="3" >  11-20 (3pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que69" value="4" >  Over 20 (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>70.</strong> Do you have a written marketing strategy and tactical implementation plan you continuously apply and follow?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que70" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que70" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>71.</strong> If yes, do you regularly monitor and measure results and performance of every element of that plan and adjust, replace, 
                <br>improve areas or activities whenever performance drops or does not exceed specific targeted benchmarks you&apos;ve established?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que71" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que71" value="1" >  Sometimes (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que71" value="2" >  Yes, Always (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>72.</strong>Do you have a complete e-mail marketing strategy you constantly adhere to, implement and follow? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que72" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que72" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>73.</strong> Do you study the success approaches other companies use that can be adapted and adopted by you? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que73" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que73" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>74.</strong> If yes, do you regularly (at least once a quarter or more) pick approaches you want to try out 
                <br>and then actually test them to see if they perform better than the approaches you are currently using? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que74" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que74" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>75.</strong>Does your marketing, sales approaches and advertising activities focus on benefits or features?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que75" value="1" >  Features (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que75" value="2" >  Benefits (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>76.</strong> Do you know the top five reasons why prospects don&apos;t buy from you?  </p>
                <div class="radio"> <label>
                        <input type="radio" name="que76" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que76" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>77.</strong> Do you have a compelling and persuasive way to overcome each of those five objections or resistance points? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que77" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que77" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>78.</strong> Do you really know what your business ideology is and can you explain it in a paragraph or less?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que78" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que78" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>79.</strong> Do you know all of the marketing assets (both tangible and intangible) your business has available to it? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que79" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que79" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>80.</strong> Have you identified all the different revenue-generating activities your business is engaged in doing so you can start improving and maximizing each one? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que80" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que80" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>81.</strong> How often do you invest time, effort and committed focus to learn better ways to improve the sales, marketing, profit and/or competitive performance of your business? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que81" value="0" >  Never (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que81" value="1" >  Once a year (1pt)   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que81" value="2" >  Twice a year (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que81" value="3" >  Constantly (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>82.</strong> How much of my three ways to grow a business model and its 32 key revenue drivers are you currently applying? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que82" value="0" >  None (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que82" value="1" >  Very Little (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que82" value="2" >  About One-Third (2pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que82" value="3" >  Most (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>83.</strong> Are you effectively applying the strategy of Pre-Eminence to all your sales, marketing, promotional and prospect/client communication?  </p>
                <div class="radio"> <label>
                        <input type="radio" name="que83" value="0" >  No (0pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que83" value="1" >  Sometimes (1pt)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que83" value="2" >  Yes, Always (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>84.</strong> Do you really know and can you clearly verbalize what your business&apos;s  biggest marketing problem is? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que84" value="0" >  No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que84" value="1" >  Unsure (1pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que84" value="2" >  Yes, Absolutely (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify" ><strong>85.</strong> Do you know what the biggest untapped sales or marketing opportunity your business has available to it and can you state it clearly? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que85" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que85" value="2" >  Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>86.</strong> Do you know what areas of your marketing your business is weak, poor or ineffectual at doing,i.e., prospecting follow-up, converting, re-selling, referrals, etc?
                </p>
                <div class="radio"> <label>
                        <input type="radio" name="que86" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que86" value="2" > Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>87.</strong> Do you know where your business&apos;s biggest growth or profit opportunity lies?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que87" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que87" value="2" > Yes (2pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>88.</strong> Are you a director/officer of a corporation?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que88" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que88" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>89.</strong> Are there a small number of shareholders in your corporation?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que89" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que89" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>90.</strong> Are you current with your corporate records?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que90" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que90" value="7" > Yes (7pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>91.</strong> Do you have joint business ventures?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que91" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que91" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>92.</strong> Do you have liquid assets over $50,000?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que92" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que92" value="4" > Yes (4pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>93.</strong> Is your personal income between $50,000 - $99,000?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que93" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que93" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>94.</strong> Is your personal income between $100,000 - $250,000?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que94" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que94" value="8" > Yes (8pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>95.</strong> Is your personal income over $250,000?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que95" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que95" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>96.</strong> Are you a licensed Practitioner, Doctor, Lawyer, CPA and Engineer?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que96" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que96" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>97.</strong> Do you have malpractice insurance?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que97" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que97" value="3" > Yes (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>98.</strong> Do you own a RV, Boat or Plane? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que98" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que98" value="7" > Yes (7pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>99.</strong> Does your household have a teenage driver? </p>
                <div class="radio"> <label>
                        <input type="radio" name="que99" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que99" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>100.</strong> Do you own rental property?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que100" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que100" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>101.</strong> Do you have company vehicles?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que101" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que101" value="6" > Yes (6pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>102.</strong> Are you a Contractor?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que102" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que102" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>103.</strong> Do you own a home?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que103" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que103" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>104.</strong> Do you have employees?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que104" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que104" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>105.</strong> Do you expect to retire within the next 5 years?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que105" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que105" value="10" > Yes (10pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>106.</strong> Do you expect to retire within the next 6 - 10 years?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que106" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que106" value="7" > Yes (7pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>107.</strong> Do you expect to retire within the next 11 - 15 years?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que107" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que107" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>108.</strong> Do you expect to retire in 16 years or more?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que108" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que108" value="3" > Yes (3pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>109.</strong> Are you the sole shareholder of your company&apos;s stock?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que109" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que109" value="5" > Yes (5pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>110.</strong> Are you involved in a partnership?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que110" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que110" value="8" > Yes (8pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>111.</strong> Have you signed a personal guarantee for a loan or lease?</p>
                <div class="radio"> <label>
                        <input type="radio" name="que111" value="0" > No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="que111" value="6" > Yes (6pt)
                    </label>
                </div>
                <br>

                <p class="text-justify"><strong>112.</strong>&quot;Have you invested in Bitcoin <strong>(BTC)</strong>?&quot;</p>
                <div class="radio"> <label>
                        <input type="radio" name="que112" value="0" > <strong>No (0pt) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>
                        <input type="radio" name="que112" value="10" > <strong>Yes (10pt)</strong>
                    </label>
                </div>
                <br>


                {{--  Options End Here  --}}
                <legend>
                    <h3><label class="mysubheading" id="sum">Total Score:</label></h3>
                </legend>
                
                <div>
                <a href="" onclick="reset()" class="btn btn-warning">Reset Score</a>
                </div>
                <br>
            </div>

        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">The "Key" For Interpreting Your Answers</div>

            <div class="panel-body">

                <p class="text-justify">Now that you&apos;ve completed answering all the questions in this assessment test, here&apos;s how to see what it all means to you:</p>

                <p class="text-justify">Tally up all the points your answers represent by calculating the point status of each answer you&apos;ve given <strong>(use the number in parentheses following each response)</strong>. Once you get your combined total, here's what it tells you . . .</p>

                <p class="text-justify"><strong>a)</strong> If your total points equal 35 or less, it tells you that your marketing is very weak, your opportunity for growth and greater profitability with a better marketing strategy to follow <strong>IS ALMOST ASSURED</strong>. You are probably realizing less than 15% of your real business/financial/marketing potential.</p>

                <p class="text-justify"><strong>b)</strong> If your total points equal 60 to 193, you're marketing at a decent level; but your business has exceptional room for improvement. You can probably increase your overall performance by 80% or more merely by better understanding and applying the marketing opportunities you have available.</p>

                <p class="text-justify"><strong>c)</strong> If your total points exceed 194 or higher, congratulations! You&apos;re a very fine marketer already and should feel good about where you&apos;ve come so far. But ironically, because <strong>YOU</strong> understand so well the real additional marketing opportunities available to your business - your business probably still has spectacular geometric growth possible if you decided to take your strategy and tactics to the highest performance levels possible. Nevertheless, I&apos;m very proud of your level of success so far and would love to talk to you about what you are doing.</p>
            </div>

        </div>
        <br>





@endsection

@section('scripts')
    <script>
    $(document).ready(function(){

        $("input[type=radio]").click(function() {
            var total = 0;
            $("input[type=radio]:checked").each(function() {
                total += parseFloat($(this).val());
            });
            console.log('Total is:' + total);
            var value = document.getElementById('sum').innerHTML;
            document.getElementById('sum').innerHTML = "Total Score:" + total;
        });

    });

    function reset(){
        document.getElementById('sum').innerHTML = "Total Score:";
    }
</script>
@endsection