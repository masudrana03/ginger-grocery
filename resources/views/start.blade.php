<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Installation Page</title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .status_btn_b:hover {
            color: #2c2b2b !important;
            background: #daf4eb;
            transition: 1.5s;
        }

        .status_btn_b {
            color: #34c38f !important;
            background-color: rgba(52, 195, 143, 0.18);
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            text-transform: capitalize;
            white-space: nowrap;
            min-width: 70px;
            text-align: center;
            font-weight: 700;
            line-height: 1;
            vertical-align: baseline;
            border-radius: 0.25rem;

            text-decoration: none;
            /* color: #fff; */
            font-family: helvetica, sans-serif;
            font-size: 20px;
            font-weight: 900;
            /* background-color: #000; */
            border: 0;
            padding: 20px 20px;
            border-radius: 3px;
            line-height: 0.428571;
            position: absolute;
            z-index: 1;
            letter-spacing: -0.2px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .aboutpic {
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6),
                    rgba(0, 0, 0, 0.6)),
                url('/assets/img/install.png')
        }
        }

        );
        background-size: cover;
        background-position: top;
        position: relative;
        }

    </style>
</head>

<body>
    <div class="aboutpic">
        {{-- <img src="{{ asset('assets/img/install.png') }}" class="img-responsive"> --}}
        <a href="/installcheck" class="status_btn_b">Start Installation</a>
    </div>
</body>

</html>
