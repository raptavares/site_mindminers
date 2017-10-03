<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
define( 'FORCE_SSL_ADMIN', true ); // Redirect All HTTP Page Requests to HTTPS - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
// END iThemes Security - Do not modify or remove this line

/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
 //Added by WP-Cache Manager
 //Added by WP-Cache Manager
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/meseems/webapps/site/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'site_mindminers');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'site_mindminers');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'meseems123');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.=eb1LM9k0<=U&PP+mqaQ@,_(h*SP9`X6;F/{ISVg|1[PkbTCt%jH#U,$>Y|-8U.');
define('SECURE_AUTH_KEY',  '-!H.XOSoxf:iJHp18J>s1S=N{!CRw**u;Xpcv%p)X^72VDCd?>6m8)xy74a+P{>7');
define('LOGGED_IN_KEY',    '#A7{W#^kYF1:Zyi|+~=nsy|g>SI1qYCxC~ct4}J:h?wRu5?3&.k&/8-xDUo-_gR=');
define('NONCE_KEY',        'mk;2+by>Q&KRJ;Q!XB,z`V!LLLweQ_I#BJkoor{@E$|v.|-9ast>X@Fy2.-oBDhv');
define('AUTH_SALT',        'Kr[B+^bNBe^o-Fe-L11sS|6qsBT0f+kFo^$)QP>W6.tmvir m@#7YFR|9C-iqHvt');
define('SECURE_AUTH_SALT', ':E6cE+j%ktJcWo{j5zB5GV%R-~8yE:+trPu.r{^`~|ldh$*g[L{_Jl)vve.+&6u9');
define('LOGGED_IN_SALT',   'X8O*i+rzY9Ni:F1)T+:Zb4y-5>bIU}<k|Fx7`pfFFZ#l|7a9WLU=P`Jrr]pWp|z~');
define('NONCE_SALT',       'dR-g]!gLEf/x+E*|kY.vr9:kolgSA-Eitw(0+mRS*Akof^H lYQ<;jPpPNm_,o7m');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wpmm_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');

/** Permite upload de qualquer arquivo */
define( 'ALLOW_UNFILTERED_UPLOADS', true );
