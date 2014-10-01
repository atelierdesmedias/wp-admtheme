# Wordpress Theme ADM

The theme for the website [atelier-medias.org](http://www.atelier-medias.org/).

This code is under GPLv3.


## TODO

See [Trello board](https://trello.com/b/0rU5rbGR/site-adm)


## Docs

See [website documentation](https://docs.google.com/spreadsheet/ccc?key=0AnxUXXNvhG7ddEJqTkxPS284a3IxRTctVVp3amhrX0E&usp=drive_web#gid=7)


## Design

See [design online](https://projects.invisionapp.com/share/C6IXCXDH#/screens/11034828?maintainScrollPosition=false)
    

### Import Facebook events into the calendar 

* Install the "[Events Made Easy](https://wordpress.org/plugins/events-made-easy/)" plugin (read the [doc](http://www.e-dynamics.be/wordpress/?cat=22))
* Install the [Facebook adapter](https://wordpress.org/support/plugin/eme-sync-facebook-events). Input your API Key / Secret
* Copy/paste the template the following code in ```Events/Settings/Events``` in the field ```Default event list format```:
```
<li>
    <div class="calendar-event">
        <a href=#_EVENTPAGEURL>
            <div class="calendar-circle"></div>
        </a>
        <h3 class="calendar-date">#j #M #Y</h3>
        <div class="calendar-info">
            <span class="calendar-time">#g h#i</span> - <span class="calendar-title">#_LINKEDNAME</span>
        </div>
        <div class="calendar-excerpt">
            #_EXCERPT
        </div>
    </div>
</li>
```

* Copy/paste the template following code in ```Events/Settings/Events``` in the field ```Default single event format```:
```
<div class="calendar-event-single">
    <div class="calendar-single-inner">
        <div class="calendar-info">
            <div class="calendar-img">
            </div>
            <div class="calendar-date">
                <h2 class="calendar-title">
                    #j #M #Y
                    <br>
                    <small class="calendar-time">#G h#i</small>
                </h2>
            </div>
        </div>
        <div class="calendar-excerpt">
           #_NOTES
       </div>
   </div>
   <div class="calendar-map">
    #_MAP
    </div>
</div>
```
