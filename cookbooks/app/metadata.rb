name             'app'
maintainer       'WAOGROUP'
maintainer_email 'progreg@ukr.net'
license          'All rights reserved'
description      'Installs/Configures app'
long_description IO.read(File.join(File.dirname(__FILE__), 'README.md'))
version          '0.1.0'

depends "apache2"
depends "database"