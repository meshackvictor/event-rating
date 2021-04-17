<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body class="antialiased">
@include('layouts.nav')
<div class="bg-indigo-100">
    <div class="container mx-auto">


        <div class="container">
            <div class="row align-items-stretch py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                         style="background-image: url({{ $event->getImage() }}); background-position: center; background-size: contain;">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-32 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $event->name }}</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto bg-white p-3">
                                    <img src="{{ asset('otapp_logo.png') }}" alt="Bootstrap"
                                         style="height: 32px; width: auto;"
                                         class="rounded-sm bg-white border border-white">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <i class="fa fa-map-marker mx-2"></i>
                                    <small>{{ $event->location }}</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fa fa-calendar mx-2"></i>
                                    <small>{{ $event->getDate() }}</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <h3 class="display-6 font-bold text-dblue-900"><i class="fa fa-sticky-note mr-3"></i> About this event!</h3>
                    <p class="my-4">{{ $event->description }}</p>
                </div>

                <div class="col-md-12">
                    <table>
                        <tr>
                            <td class="w-1/2 font-bold py-2">Location</td>
                            <td>{{ $event->location }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Date</td>
                            <td>{{ \Carbon\Carbon::make($event->date)->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Event Type</td>
                            <td>{{ $event->category->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Event Organizer</td>
                            <td>{{ $event->agent->name }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-12">
                    <h5 class="display-6 text-xl font-bold mt-6 text-dblue-900"><i class="fa fa-share-alt mr-3"></i> Share This Event
                    </h5>

                    <div class="mt-2">
                        <button class="bg-yellow-200 rounded-full px-4 py-2  mx-auto mt-2" onclick="qrcode.downloadImage('qrcode')">
                            <i class="fa fa-share"></i> Share QR!
                        </button>
                        <a href="https://wa.me/?text={{ urlencode($event->name) }}" target="_blank" class="bg-yellow-200 rounded-full px-4 py-3  mx-auto mt-2">
                            <i class="fa fa-whatsapp"></i> Whatsapp
                        </a>
                        <canvas id="canvas" class="mt-3"></canvas>


                    </div>


                </div>

                <div class="col-md-12">
                    <h3 class="display-6 font-bold mt-12 text-center text-dblue-900"><i class="fa fa-commenting mr-1"></i> Rate our event!</h3>
{{--                    <p class="my-4">Help us improve on our future events. Let us know how wa this event experience to--}}
{{--                        you!</p>--}}
                    <div class="form-group">
                        <div class="rating">

                            <input style=" display: none !important;" type="radio" name="rating" value="1" id="1"><label
                                for="1">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="2" id="2"><label
                                for="2">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="3" id="3"><label
                                for="3">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="4" id="4"><label
                                for="4">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="5" id="5"><label
                                for="5">☆</label>


                        </div>
                    </div>
                    <div class=" md:mx-32 my-2">
                        <h5 class="text-center">Write your review!</h5><br>
                        <textarea class="form-control" rows="7" placeholder="I was impressed by the...."></textarea>
                    </div>

                    <p class="my-4 text-center">Help us improve on our future events by taking telling us about your experience on this event!</p>
                </div>
            </div>

            <div class="md:flex md:flex-wrap md:-mx-4 mt-6 md:mt-12">

                <div class="md:w-1/3 md:px-4 xl:px-6 mt-8 md:mt-0 text-center">
                    <span class="w-20 border-t-2 border-solid border-indigo-200 inline-block mb-3"></span>
                    <h5 class="text-xl font-medium uppercase mb-4">Fresh Design</h5>
                    <p class="text-gray-600">FWR blocks bring in an air of fresh design with their creative layouts and
                        blocks, which are easily customizable</p>
                </div>

                <div class="md:w-1/3 md:px-4 xl:px-6 mt-8 md:mt-0 text-center">
                    <span class="w-20 border-t-2 border-solid border-indigo-200 inline-block mb-3"></span>
                    <h5 class="text-xl font-medium uppercase mb-4">Clean Code</h5>
                    <p class="text-gray-600">FWR blocks are the cleanest pieces of HTML blocks, which are built with
                        utmost care to quality and usability.</p>
                </div>

                <div class="md:w-1/3 md:px-4 xl:px-6 mt-8 md:mt-0 text-center">
                    <span class="w-20 border-t-2 border-solid border-indigo-200 inline-block mb-3"></span>
                    <h5 class="text-xl font-medium uppercase mb-4">Perfect Tool</h5>
                    <p class="text-gray-600">FWR blocks is a perfect tool for designers, developers and agencies looking
                        to create stunning websites in no time.</p>
                </div>

            </div>

        </div>
    </div>
</div>
{{--<script type="text/javascript" src="{{ asset('qrious-master/dist/qrious.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('qrcode-with-logos-master/doc/qrcode-with-logo.min.js') }}"></script>
<script type="text/javascript">
    {{--var qr = new QRious({--}}
    {{--    element: document.querySelector('canvas'),--}}
    {{--    value: '{{ route('event', $event->id) }}'--}}
    {{--});--}}
    window.qrcode = new QrCodeWithLogo({
        canvas: document.getElementById("canvas"),
        content: "http:{{ route('event', $event->id) }}",
        width: 180,
        download: true,
        // image: document.getElementById("image"),
        logo: {
            src: "{{ asset('images/otapp_logo_1.png') }}"
        }
    });
    qrcode.toCanvas().then(() => {
        // qrcode.toImage().then(() => {
        //     qrcode.downloadImage("hello world");
        // });
    });
</script>
</body>
</html>