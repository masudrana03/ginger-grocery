<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>payment successfull</title>
    </head>
    
    <style>
        body {
            background: #e7e8e9;
        }

        #card {
            position: relative;
            width: 316px;
            display: block;
            margin: 30px auto;
            text-align: center;
            font-family: 'Source Sans Pro', sans-serif;
        }

        #upper-side {
            padding: 2em;
            background-color: #dd1b1b;
            display: block;
            color: #fff;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;
        }

        #checkmark {
            font-weight: lighter;
            fill: #fff;
            margin: -3.5em auto auto 20px;
        }

        #status {
            font-weight: lighter;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 0;
        }

        #lower-side {
            padding: 2em 2em 5em;
            background: #fff;
            display: block;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        #message {
            margin-top: -.5em;
            color: #757575;
            letter-spacing: 1px;
        }

        #contBtn {
            position: relative;
            top: 1.5em;
            text-decoration: none;
            background: #dd1b1b;
            color: #fff;
            margin: auto;
            padding: 0.8em 3em;
            -webkit-box-shadow: 0 15px 30px rgba(50, 50, 50, 0.21);
            -moz-box-shadow: 0 15px 30px rgba(50, 50, 50, 0.21);
            box-shadow: 0 15px 30px rgba(50, 50, 50, 0.21);
            border-radius: 25px;
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }
        #contBtn:hover {
            -webkit-box-shadow: 0 15px 30px rgba(50, 50, 50, 0.41);
            -moz-box-shadow: 0 15px 30px rgba(50, 50, 50, 0.41);
            box-shadow: 0 15px 30px rgba(50, 50, 50, 0.41);
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }
    </style>
    
    <body>
        <section>
            <div class="rt-container">
                <div class="col-rt-12">
                    <div class="Scriptcontent">
                        <div id='card' class="animated fadeIn">
                            <div id='upper-side'>
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                  </svg>
                                    <circle
                                        fill="none"
                                        stroke="#ffffff"
                                        stroke-width="5"
                                        stroke-miterlimit="10"
                                        cx="109.486"
                                        cy="104.353"
                                        r="32.53"/>
                                </svg>
                                <h3 id='status'>
                                    Failed
                                </h3>
                            </div>
                            <div id='lower-side'>
                                <p id='message'>
                                    Opps!,<br>Payment failed
                                </p>
                                <a id="contBtn">Sorry</a>
                            </div>
                        </div>
                        <!-- partial -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Analytics -->
    </body>
</html>