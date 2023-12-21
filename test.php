<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300;400&display=swap');

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */

        .toggle-theme-container {
            box-shadow: 2px 4px 6px 0px rgba(0, 0, 0, 0.35);
            width: 80px;
            height: 30px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            padding: 5px;
            display: flex;
            justify-content: space-between;
        }

        .toggle-theme-container span {
            padding: 0 5px;
            color: #D9D9D9;
            font-family: 'Kalam', cursive;
            font-weight: 400;
        }

        .toggle-theme-container>.switch {
            box-shadow: inset 2px 4px 6px 0px rgba(0, 0, 0, 0.35);
            width: 20px;
            height: 20px;
            border-radius: 15px;
        }

        .light {
            flex-direction: row;
            background-color: #323232;
            transition-duration: 1s;
        }

        .light .toggle-dark {
            display: none;
        }

        .light .switch {
            background-color: #D9D9D9;
        }

        .dark {
            flex-direction: row-reverse;
            background-color: #D9D9D9;
            transition-duration: 1s;
        }

        .dark .toggle-light {
            display: none;
        }

        .dark .switch {
            background-color: #323232;
        }

        .dark span {
            color: #323232;
        }
    </style>
</head>

<body>

    <div class="toggle-theme-container dark" style="cursor: pointer;">
        <div class="switch"></div>
        <span class="toggle-light">Light</span>
        <span class="toggle-dark">Dark</span>
    </div>

</body>

</html>