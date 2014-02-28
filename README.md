Coming soon!

## Configure WP Gists locally

Using an existing local development environment (like Salty WordPress or Varying Vagrant Vagrants), you can easily contribute to the code powering wpgists.org.

1. Clone this repo: `git clone --recursive git@github.com:danielbachhuber/WP-Gists.git wpgists.dev`
1. Create a `wp-config-env.php` file, and add your expected database credentials / auth salts / `WP_SITEURL` and `WP_HOME`
1. Create a database: `wp db create`
1. Install WordPress: `wp core install --prompt`
1. Navigate to wpgists.dev in your web browser.

To build stylesheets using Sass:

1. Install Node.js and NPM
1. Install the package dependencies: from the project root, `npm install`
1. Install Grunt globally: `npm install -g grunt-cli`
1. Build: from the project root, `grunt build`

Et voila!