<?php
  class My_Theme_Updater {
    private $file;
    private $theme;
    private $version;
    private $active;

    function __construct($file) {
        $this->file = $file;
        add_filter('pre_set_site_transient_update_themes', array($this, 'check_for_update'));
        add_filter('themes_api', array($this, 'get_update_info'), 10, 3);
        add_filter('upgrader_source_selection', array($this, 'upgrader_source_selection'), 10, 3);
        $this->theme = wp_get_theme(basename(dirname($file)));
        $this->version = $this->theme->get('Version');
        $this->active = $this->theme->get_stylesheet() === get_option('stylesheet');
    }

    public function check_for_update($transient) {
        if (empty($transient->checked)) return $transient;

        $remote_version = $this->get_remote_version();

        if (isset($remote_version) && version_compare($this->version, $remote_version, '<')) {
            $transient->response[$this->theme->get_stylesheet()] = array(
                'new_version' => $remote_version,
                'package' => $this->get_remote_package(),
                'url' => $this->get_remote_info()
            );
        }

        return $transient;
    }

    public function get_update_info($false, $action, $args) {
        if ('theme_information' === $action && $this->theme->get_stylesheet() === $args->slug) {
            return $this->get_remote_info();
        }
        return $false;
    }

    public function upgrader_source_selection($source, $remote_source, $upgrader) {
        global $wp_filesystem;
        if (strpos($source, $this->theme->get_stylesheet()) === false) {
            $source = trailingslashit($remote_source) . $this->theme->get_stylesheet();
            $upgrader->skin->feedback(__('Renaming source directory...'));
            if (!$wp_filesystem->move($remote_source, $source)) {
                return new WP_Error();
            }
        }
        return $source;
    }

    private function get_remote_version() {
        $remote_info = $this->get_remote_info();
        return $remote_info->version ?? null;
    }

    private function get_remote_package() {
        $remote_info = $this->get_remote_info();
        return $remote_info->download_link ?? null;
    }

    private function get_remote_info() {
        $remote_info = get_transient('my_theme_update_info');

        if (!$remote_info) {
            $response = wp_remote_get('https://api.github.com/repos/listensay/Niceowo-wordpress/releases/latest');
            if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                $remote_info = json_decode(wp_remote_retrieve_body($response));
                set_transient('my_theme_update_info', $remote_info, 12 * HOUR_IN_SECONDS);
            }
        }

        return $remote_info;
    }
  }

  new My_Theme_Updater(__FILE__);
