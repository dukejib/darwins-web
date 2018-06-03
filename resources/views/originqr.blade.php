@extends('layouts.master')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">The Origins of QR Code</div>

    <div class="panel-body">

        {{--  #1  --}}
        <div class="media">
            <div class="media-left media-middle">
                <img src="{{ asset('img/pic4.jpg') }}" alt="Cuecat" class="media-object" width="200px">
            </div>
            <div class="media-body">
                <p class="text-justify">The <strong>:CueCat</strong> was a barcode scanner manufactured by <strong>Digital Convergence</strong> in the early 2000&apos;s and was heralded as a revolutionary technology.<p>

                <p class="text-justify">classIt was a little white plastic cat with a built-in infrared sensor that would plug into your computer&apos;s PS2 port and scan special barcodes <strong>(and regular barcodes)</strong> which would then take you to a related website. More specifically, the product and associated intellectual property would instantly and directly link product <strong>UPC, EAN, ISBN</strong> as well as the unique <strong>:CRQ Cue Codes</strong><img src="{{ asset('img/cuecat.gif') }}" width="60px"> to their appropriate websites. Usually these were to links buried deeply within a site which could be further targeted demographically or geographically.<p>

                <p class="text-justify">To get the device in the hands of consumers, Digital Convergence mailed them out to subscribers of high profile tech magazines like Wired or through its vendor <strong>RadioShack Corporation</strong>. The unique :CRQ Cue Codes were placed within traditional media content and some advertisements in publications like Wired Magazine, Forbes and its specialty magazines, Parade Magazine and several Daily Newspapers. Product Cues were also placed in many catalogs to facilitate instant e-commerce shopping and the automation of wish lists <strong>(such as RadioShack&apos;s catalogs)</strong>. As you can imagine, this technology could eliminate search with "laser beam" accuracy.</p>
            </div>
        </div>
        

        {{--  #2  --}}
        <div class="media">
            
            <div class="media-body">
                <p class="text-justify">Some thought that the <strong>:CueCat</strong> was going to be huge for a long time, but it wasn&apos;t. So what happened? As the "tethered" <strong>:CueCat</strong> was just beginning to continue its recognition to consumers, other "store and forward" or "bookmark life" concepts such as portable scanners like the one manufactured by Cross as a pen, and a keychain scanner were ultimately cost-reduced and readied for deployment.</p>

                <p class="text-justify">Also the dot-com crashed and advertising money around <strong>:CueCat</strong> started to crumble. Furthermore, there was an abundant of bad press related to a discovery that <strong>:CueCat</strong> devices were sending information on its users back to its servers. Some hackers posted instructions on how to stop it from reporting your info back to Digital Convergence. In response Digital Convergence threatened to sue the hackers. It was a big mess. But the real reason it didn&apos;t pop off was because it just wasn&apos;t that appealing of a product at the time. Unlike your phone, the <strong>:CueCat </strong> was tethered to your desk and in 2000 the interactivity of the Internet wasn&apos;t what it is today. The market just wasn&apos;t ready; and neither was the product.
                </p>

            </div>
            <div class="media-right media-middle">
                <img src="{{ asset('img/pic2.jpg') }}" alt="Cuecat" class="media-object" width="200px">
            </div>
        </div>

        {{--  #3  --}}
        <div class="media">
            <div class="media-left">
                <img src="{{ asset('img/pic3.jpg') }}" alt="Cuecat" class="media-object" width="200px">
            </div>
            <div class="media-body">
                <p class="text-justify">
                Today, everyone with a mobile camera phone with an installed <strong>Q.R. Code Scanning App</strong> has the potential to read barcodes, thus negating the need for a separate scanning device that Digital Convergence had produced to achieve the ultimate goal of linking the physical world to virtual space.<br>
                 Since January of 2002, the database servers which provided this machine-readable code to Internet URL linking are no longer in operation. The desktop client which requires a registration code is no longer supported, nor can these codes be generated for the Windows PC or Apple OS-X software.<br>
                The weak encryption from the <strong>:CueCat</strong> put in place to protect the company under DCMA laws can be circumvented via instructions that can be found on the Internet. Many third party book, CD, DVD, Video Game and other media home inventory and web applications can even accept the obfuscated output and convert it to the original code format. If you are looking for the rare USB or popular PS/2 keyboard wedge <strong>:CueCat</strong>, they can be found inexpensively through many websites online.
                </p>
            </div>
        </div>
  
        <p class="text-justify">This site will not provide any support or answer any questions regarding the <strong>:CueCat</strong>. Please perform a <a href="https://duckduckgo.com/">DuckDuckGo</a> search for additional information from the many fans and inquisitive hardware hackers of this technology that came before its time... but could come back as applied to industrial operation in the form of mass or automatic reading of Q.R. Codes.</p>

        <p class="text-justify">Nowadays, Q.R. Code scanners are all the rage. Companies and stores promote sales, special offers, and deals when someone uses a smartphone to scan a Q.R. Code related to their product. It&apos;s big business. Other companies, like eBay, now allow shoppers to scan the Q.R. Code of an item to see if it&apos;s available from its inventory. We&apos;re sure you have scanned more than a couple of Q.R. Codes. The term or name <strong>:CueCat</strong> when the application (app) came of age produced the name Q.R. Code <strong>(Quick Response Code)</strong> to compete with barcodes, the former containing the capacity for greater information. For that, you can thank <strong>:CueCat</strong>.
        </p>
        <br>
       

        <h3 class="text-center">The screenshot below is the original CRQ & CueCat Installation Guide Outline:</h3>
        <img src="{{ asset('img/cuecatguide1.jpg') }}" class="thumbnail img-responsive"><br>
        <img src="{{ asset('img/cuecatguide2.jpg') }}" class="thumbnail img-responsive"><br>
        <p class="mysubheading">Play the videos below for more information on what Cue-Cat&apos;s purpose is and what it did before Mobile Phones with installed QR Code Scanning Apps came about into development</p>

        <div class="row">

            <div class="col-md-6">
                    <video width="480" height="360" controls class="center-block">
                        <source src="{{ asset('videos/cuecat02.webm') }}" type="video/webm">
                        <source src="{{ asset('videos/cuecat02.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
            </div>

             <div class="col-md-6">
                    <video width="480" height="360" controls class="center-block">
                        <source src="{{ asset('videos/cuecat01.webm') }}" type="video/webm">
                        <source src="{{ asset('videos/cuecat01.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
            </div>

        </div>
        <br>
        <br>
        <div class="media">
            <div class="media-left media-middle">
                <img src="{{ asset('img/pic1.jpg') }}" alt="Cuecat" class="media-object" width="450px">
            </div>
            <div class="media-body">
                <p class="text-justify">
                    The term App(s) means "Application" and generally speaking an App is defined as a means of using software to convert a desk-top website&apos;s visual format to the equivalent of a 2x4 or larger mobile device screens.<br><br>
                    It is also a means or mechanism of reducing a long URL name to just a few key strokes, needed because of the small size of mobile devices, using what is known as a <strong>Q.R. Code</strong> to implement the process, in other words it is all about ergonomics.<br><br>
                    Ergonomics is an applied science that deal with designing and arranging things at a high quality level so that people can interact with them most efficiently, effectively, easily and safely.
                </p>
            </div>
        </div>



    </div>

    </div>


@endsection