<div class="navbar navbar-inverse" role="navigation">
        <div class="blockMain">

                {% if is_granted("ROLE_USER") %}
                    {% set mainMenu = [
                        {'path': 'main',          'name': 'Home' },
                        {'path': 'all',           'name': 'All' },
                        {'path': 'TEST_test',     'name': 'TEST' },
                        {'path': 'fos_user_profile_show',   'name': 'Profile' },
                        {'path': 'fos_user_security_logout','name': 'logout'}
                    ] %}          
                {% else %}
                    {% set mainMenu = [
                        {'path': 'main',          'name': 'Home' },
                        {'path': 'fos_user_security_login',         'name': 'Login' },
                        {'path': 'fos_user_registration_register',  'name': 'Register' }
                    ] %}          
                {% endif %}

            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                {% for item in mainMenu %}
                <li{{ app.request.get('_route') == item['path'] ? ' class="active"' : '' }}>
                    <a href="{{ path(item['path']) }}">{{ item['name'] }}</a>
                </li>
                {% endfor %}
            </ul>
            </div><!--/.navbar-collapse -->
        </div>
        </div>