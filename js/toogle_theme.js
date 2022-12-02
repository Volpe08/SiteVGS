    let get_now_theme = localStorage.getItem('app_theme');
    let label_white_theme = document.getElementById('light');
    let label_dark_theme = document.getElementById('dark');
    let label_normal_theme = document.getElementById('normal');

    function switch_theme(value_theme)
    {
        let add_class_theme = '';
        if (value_theme === 'white') {
            add_class_theme = label_white_theme;
            remove_class_theme = label_dark_theme;
            remove_class_theme = label_normal_theme;
            document.documentElement.style.setProperty('--body_bg_color', '#C0C0C0');
            document.documentElement.style.setProperty('--bg_complement', 'whitesmoke');
            document.documentElement.style.setProperty('--text_color', '#000');
            document.documentElement.style.setProperty('--border_black', '2px solid black;');
            document.documentElement.style.setProperty('--border_solo', '2px solid black');

            document.documentElement.style.setProperty('--twitch', 'url(../img/twitch.png)');
            document.documentElement.style.setProperty('--discord', 'url(../img/discord.png)');
            document.documentElement.style.setProperty('--facebook', 'url(../img/facebook.png)');
            document.documentElement.style.setProperty('--twitter', 'url(../img/twitter.png)');
            document.documentElement.style.setProperty('--youtube', 'url(../img/youtube.png)');
        }
        else if (value_theme === 'dark')
        {
            add_class_theme = label_dark_theme;
            remove_class_theme = label_white_theme;
            remove_class_theme = label_normal_theme;
            document.documentElement.style.setProperty('--body_bg_color','#000');
            document.documentElement.style.setProperty('--bg_complement', '#2A2A2A');
            document.documentElement.style.setProperty('--text_color','#FFF');
            document.documentElement.style.setProperty('--text_black','#FFF');
            document.documentElement.style.setProperty('--border_black','2px solid white');
            document.documentElement.style.setProperty('--border_solo','2px solid white');

            document.documentElement.style.setProperty('--twitch', 'url(../img/twitch_white.png)');
            document.documentElement.style.setProperty('--discord', 'url(../img/discord_white.png)');
            document.documentElement.style.setProperty('--facebook', 'url(../img/facebook_white.png)');
            document.documentElement.style.setProperty('--twitter', 'url(../img/twitter_white.png)');
            document.documentElement.style.setProperty('--youtube', 'url(../img/youtube_white.png)');
        }
        else if (value_theme === 'normal')
        {
            add_class_theme = label_normal_theme;
            remove_class_theme = label_white_theme;
            remove_class_theme = label_dark_theme;
            document.documentElement.style.setProperty('--body_bg_color','#2E2E2E');
            document.documentElement.style.setProperty('--bg_complement','dodgerblue')
            document.documentElement.style.setProperty('--text_color','#FFF');
            document.documentElement.style.setProperty('--text_black','#000');
            document.documentElement.style.setProperty('--border_black','2px solid black;');
            document.documentElement.style.setProperty('--border_solo','2px solid dodgerblue');

            document.documentElement.style.setProperty('--twitch', 'url(../img/twitch.png)');
            document.documentElement.style.setProperty('--discord', 'url(../img/discord.png)');
            document.documentElement.style.setProperty('--facebook', 'url(../img/facebook.png)');
            document.documentElement.style.setProperty('--twitter', 'url(../img/twitter.png)');
            document.documentElement.style.setProperty('--youtube', 'url(../img/youtube.png)');
        }
        localStorage.setItem('app_theme',value_theme);
        add_class_theme.classList.add('choosed');
        remove_class_theme.classList.remove('choosed');
        add_class_theme.style.color = 'white';
        remove_class_theme.style.color = 'var(--border_black)';
    }


    if (get_now_theme)
    {
        if(get_now_theme === 'white')
        {
            label_white_theme.classList.add('choosed');
            label_white_theme.style.color = 'white';
            label_dark_theme.style.color = 'var(--border_black)';
            label_normal_theme.style.color = 'var(--border_black)';
            document.documentElement.style.setProperty('--body_bg_color','#C0C0C0');
            document.documentElement.style.setProperty('--bg_complement','whitesmoke')
            document.documentElement.style.setProperty('--text_color','#000');
            document.documentElement.style.setProperty('--border_black','2px solid black;');
            document.documentElement.style.setProperty('--border_solo','2px solid black');

            document.documentElement.style.setProperty('--twitch', 'url(../img/twitch.png)');
            document.documentElement.style.setProperty('--discord', 'url(../img/discord.png)');
            document.documentElement.style.setProperty('--facebook', 'url(../img/facebook.png)');
            document.documentElement.style.setProperty('--twitter', 'url(../img/twitter.png)');
            document.documentElement.style.setProperty('--youtube', 'url(../img/youtube.png)');
        }
        else if (get_now_theme === 'dark')
        {
            label_dark_theme.classList.add('choosed');
            label_dark_theme.style.color = 'dark';
            label_white_theme.style.color = 'var(--border_black)';
            label_normal_theme.style.color = 'var(--border_black)';
            document.documentElement.style.setProperty('--body_bg_color','#000');
            document.documentElement.style.setProperty('--text_color','#FFF');
            document.documentElement.style.setProperty('--bg_complement','#2E2E2E')
            document.documentElement.style.setProperty('--text_black','#FFF');
            document.documentElement.style.setProperty('--border_black','2px solid white');
            document.documentElement.style.setProperty('--border_solo','2px solid white');

            document.documentElement.style.setProperty('--twitch', 'url(../img/twitch_white.png)');
            document.documentElement.style.setProperty('--discord', 'url(../img/discord_white.png)');
            document.documentElement.style.setProperty('--facebook', 'url(../img/facebook_white.png)');
            document.documentElement.style.setProperty('--twitter', 'url(../img/twitter_white.png)');
            document.documentElement.style.setProperty('--youtube', 'url(../img/youtube_white.png)');
        }
        else if (get_now_theme === 'normal')
        {
            label_normal_theme.classList.add('choosed');
            label_normal_theme.style.color = 'normal';
            label_dark_theme.style.color = 'var(--border_black)';
            label_white_theme.style.color = 'var(--border_black)';
            document.documentElement.style.setProperty('--body_bg_color','#2E2E2E');
            document.documentElement.style.setProperty('--text_color','#FFF');
            document.documentElement.style.setProperty('--bg_complement','dodgerblue')
            document.documentElement.style.setProperty('--text_black','#000');
            document.documentElement.style.setProperty('--border_black','2px solid black;');
            document.documentElement.style.setProperty('--border_solo','2px solid dodgerblue');

            document.documentElement.style.setProperty('--twitch', 'url(../img/twitch.png)');
            document.documentElement.style.setProperty('--discord', 'url(../img/discord.png)');
            document.documentElement.style.setProperty('--facebook', 'url(../img/facebook.png)');
            document.documentElement.style.setProperty('--twitter', 'url(../img/twitter.png)');
            document.documentElement.style.setProperty('--youtube', 'url(../img/youtube.png)');
        }
    }
    else
    {
        localStorage.setItem('app_theme','normal');
        label_dark_theme.classList.add('choosed');
        document.documentElement.style.setProperty('--body_bg_color','#2E2E2E');
        document.documentElement.style.setProperty('--bg_complement','dodgerblue')
        document.documentElement.style.setProperty('--text_color','#FFF');
        document.documentElement.style.setProperty('--text_black','#000');
        document.documentElement.style.setProperty('--border_black','2px solid black;');
        document.documentElement.style.setProperty('--border_solo','2px solid dodgerblue');

        document.documentElement.style.setProperty('--twitch', 'url(../img/twitch.png)');
        document.documentElement.style.setProperty('--discord', 'url(../img/discord.png)');
        document.documentElement.style.setProperty('--facebook', 'url(../img/facebook.png)');
        document.documentElement.style.setProperty('--twitter', 'url(../img/twitter.png)');
        document.documentElement.style.setProperty('--youtube', 'url(../img/youtube.png)');
    }