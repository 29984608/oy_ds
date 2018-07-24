<?php defined('IN_MET') or exit('No permission'); ?>
<header class="$uicss swiper-header <if value='!$ui[met_member_register]&&!($c[met_lang_mark]&&$ui[langok])&&!($c[met_ch_lang]&&$ui[fontok]&&$data[lang] eq "cn")&&!$ui[searchok]'>not-right</if>" m-id="{$ui.mid}" m-type="head_nav" role="heading">
  <nav role="navigation">
    <div class="<if value='$ui[navfull]'>container-fluid<else/>container</if>">
      <div class="left-box">
        <div class="logo-box">
          <a href="{$c.index_url}" title="{$c.met_webname}">
            <img src="{$c.met_logo}" alt="{$c.met_webname}">
            <img src="{$ui.logos}" alt="{$c.met_webname}">
          </a>
        </div>
        <div class="nav-box nav-fix"> 
          <ul>
            <if value="$ui[navbuttonok]">
            <li class="m-r-0 phone">
              <a href="{$ui.navbuttonlink}">
                <if value="$ui[navbuttonicon]">
                <i class="{$ui.navbuttonicon|str_replace:'<m',' <m',@@}"></i>
                </if>
                <span>{$ui.navbuttonfont}</span>
              </a>
            </li>
            </if>
            <tag action="category" type="head" class="active"></tag>
            <li class="m-r-{$ui.navmargin} <if value="$data[classnow] eq 10001">active</if>">
              <a href="{$c.index_url}" title="{$word.home}">
                <if value="$ui[naviconok]"><i class="icon fa-bank"></i></if>
                <span>{$word.home}</span>
              </a>
            </li>
            <tag action="category" type="head" class="active">
            <li class="m-r-{$ui.navmargin} {$m.class} <if value='$ui[navsonok] && $m[sub]'>nav-sub</if>">
              <a href="{$m.url}" title="{$m.name}">
                <if value="$ui[naviconok]"><i class="{$m.icon}"></i></if>
                <span>{$m.name}</span>
              </a>
              <if value="$ui[navsonok] && $m[sub]">
              <ul>
                <li class="{$m.class}">
                  <a href="{$m.url}" {$m.urlnew} title="<if value='$m[module] neq 1'>{$ui.navall}<else/>{$m.name}</if>">
                    <if value="$ui[naviconok]"><i class="{$m.icon}"></i></if>
                    <span><if value="$m[module] neq 1">{$ui.navall}<else/>{$m.name}</if></span>
                  </a>
                </li>
                <tag action="category" type="son" cid="$m['id']" class="active">
                <li class="{$m.class} <if value='$m[sub]'>nav-sub</if>">
                  <a href="{$m.url}" {$m.urlnew} title="{$m.name}">
                    <if value="$ui[naviconok]"><i class="{$m.icon}"></i></if>
                    <span>{$m.name}</span>
                  </a>
                  <if value="$m[sub]">
                  <ul>
                    <li class="{$m.class}">
                      <a href="{$m.url}" {$m.urlnew} title="<if value='$m[module] neq 1'>{$ui.navall}<else/>{$m.name}</if>">
                        <if value="$ui[naviconok]"><i class="{$m.icon}"></i></if>
                        <span><if value="$m[module] neq 1">{$ui.navall}<else/>{$m.name}</if></span>
                      </a>
                    </li>
                    <tag action="category" type="son" cid="$m['id']" class="active">
                    <li class="{$m.class}">
                      <a href="{$m.url}" {$m.urlnew} title="{$m.name}">
                        <if value="$ui[naviconok]"><i class="{$m.icon}"></i></if>
                        <span>{$m.name}</span>
                      </a>
                    </li>
                    </tag>
                  </ul>
                  </if>
                </li>
                </tag>
              </ul>
              </if>
            </li>
            </tag>
          </ul>
        </div>
      </div>
      <div class="right-box">
        <if value="$c[met_member_register]">
        <if value="$user">
        <div class="user-box" m-id="member" m-type="member">
          <a href="javascript:void(0);">
            <i class="icon fa-user"></i>
            <span>{$user.username}</span>
          </a>
          <ul>
            <li>
              <a href="{$c.met_weburl}member/basic.php?lang={$data.lang}" title="{$word.memberIndex9}">
                <i class="icon wb-user"></i>
                <span>{$word.memberIndex9}</span>
              </a>
            </li>
            <li>
              <a href="{$c.met_weburl}member/basic.php?lang={$data.lang}&a=dosafety" title="{$word.accsafe}">
                <i class="icon wb-lock"></i>
                <span>{$word.accsafe}</span>
              </a>
            </li>
            <li>
              <a href="{$c.met_weburl}member/login.php?lang={$data.lang}&a=dologout" title="{$word.memberIndex10}">
                <i class="icon wb-power"></i>
                <span>{$word.memberIndex10}</span>
              </a>
            </li>
          </ul>
        </div>
        <else/>
        <div class="user-button" m-id="member" m-type="member">
          <a href="{$c.met_weburl}member/login.php?lang={$data.lang}" title="{$word.login}"><i class="icon fa-user"></i></a>
          <ul>
            <li><a href="{$c.met_weburl}member/register_include.php?lang={$data.lang}" title="{$word.register}">{$word.register}</a></li>
            <li><a href="{$c.met_weburl}member/login.php?lang={$data.lang}" title="{$word.login}">{$word.login}</a></li>
          </ul>
        </div>
        </if>
        </if>
        <if value="$c[met_lang_mark]&&$ui[langok]">
        <div class="lang-box" m-type="lang">
          <lang></lang>
          <if value="$sub gt 1">
          <lang>
          <if value="$data[lang] eq $v[mark]">
          <a href="javascript:void(0);">
            <if value="$ui[langimgok]">
            <img src="{$v.flag}" alt="{$v.name}">
            </if>
            <span>{$v.name}</span>
          </a>
          </if>
          </lang>
          <ul>
            <lang>
            <li>
              <a href="{$v.met_weburl}" title="{$v.name}">
                <if value="$ui[langimgok]">
                <img src="{$v.flag}" alt="{$v.name}">
                </if>
                <span>{$v.name}</span>
              </a>
            </li>
            </lang>
          </ul>
          </if>
        </div>
        </if>
        <if value="$c[met_ch_lang]&&$ui[fontok]&&$data[lang] eq 'cn'"> 
        <div class="font-box" m-id="0" m-type="lang">
          <a href="javascript:void(0);">
            <i>繁</i>
          </a> 
        </div>
        </if>
        <if value="$ui[searchok]">
        <div class="search-box">
          <a href="javascript:void(0);"><i class="icon fa-search"></i></a>
          <tag action="category" type="current" cid="$ui[searchid]"></tag>
          <if value="$m.module eq 3">
          <form method="get" action="<if value='$data[classnow] neq 10001'>../</if>{$m.foldername}/">
            <button class="icon fa-search" type="submit"></button>
            <input type="hidden" name="search" value="search">
            <input type="hidden" name="lang" value="{$data.lang}">
            <input type="text" name="content" value="{$data.content}" placeholder="{$ui.searchkeyword}">
          </form>
          <else/>
          <form method="get" action="<if value='$data[classnow] neq 10001'>../</if>search/">
            <button class="icon fa-search" type="submit"></button>
            <input type="hidden" name="lang" value="{$data.lang}">
            <input type="hidden" name="class1" value="{$data.class1}">
            <input type="text" name="searchword" value="{$data.searchword}" placeholder="{$ui.searchkeyword}">
          </form>
          </if>
        </div>
        </if>
      </div>
    </div>
  </nav>
  <section class="box-ok <if value='$ui[boxok] eq 2'>mobile</if>"></section>
</header>