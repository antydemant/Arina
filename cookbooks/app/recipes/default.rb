#
# Cookbook Name:: app
# Recipe:: default
#
# Copyright 2014, NRE
#
# All rights reserved - Do Not Redistribute
#
include_recipe "mysql::ruby"


node['vhosts'].each do |app,vhost|

    if !::File.exists?(vhost["path"])
        directory vhost["path"] do
          owner "www-data"
          group "www-data"
          mode "0755"
          action :create
          recursive true
        end
    end

    bash "hosts" do
       code "echo 127.0.0.1 #{vhost["server_name"]} >> /etc/hosts"
    end

    web_app app do
      template 'vhost.erb'
      alias_path vhost['alias_path']
      docroot vhost['docroot']
      server_name vhost['server_name']
      server_email vhost['server_email']
    end

    if vhost['database']
        mysql_database vhost['database'] do
          connection ({:host => 'localhost', :username => 'root', :password => node['mysql']['server_root_password']})
          encoding  'utf8'
          collation 'utf8_general_ci'
          action :create
        end
    end

    if vhost["composer_need"] == true
        chef_php_extra_composer vhost['path'] do
          action [:install_composer, :install_packages]
        end
    end

    if vhost['migrate'] == true
        bash "migation" do
          user "root"
          cwd "#{vhost["docroot"]}/../protected"
          code <<-EOH
          php yiic.php migrate --interactive=0
          EOH
        end
    end
end