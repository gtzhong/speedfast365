<?php
include_once dirname(__file__) . '/crond_init.php';

Model_Redis::instance()->sync_member_id_to_ss_user_id();

Model_Redis::instance()->sync_ss_user_id_to_user_row();

Model_Redis::instance()->sync_server_list();
