<?php defined('IN_MET') or exit('No permission'); ?>
<footer class="$uicss <if value='$ui[contenttype]'>lr</if>" m-id="{$ui.mid}" m-type="foot">
  <div class="container">
    <div class="foot-left">
      <div class="foot-nav" m-id="noset" m-type="foot_nav">
        <tag action="category" type="foot">
        <a href="{$m.url}" {$m.urlnew} title="{$m.name}">{$m.name}</a>
        </tag>
      </div>
      <if value="$ui[linkok]">
      <div class="text-link" m-id="noset" m-type="link">
        <ul>
          <li>{$ui.linktitle}</li>
          <tag action="link.list">
          <li>
            <a href="{$v.weburl}" title="{$v.webname}" target="_blank">
              <if value="$v.link_type eq 1">
              <img src="{$v.weblogo}" alt="{$v.webname}">
              <else/>
              <span>{$v.webname}</span>
              </if>
            </a>
          </li>
          </tag>
        </ul>
      </div>
      </if>
      <div class="foot-copyright">
        <if value="$c[met_footaddress]"><p>{$c.met_footaddress}</p></if>
        <if value="$c[met_foottel]"><p>{$c.met_foottel}</p></if>
        <if value="$c[met_footother]">{$c.met_footother}</if>
        <if value="$c[met_footright]||$c[met_footstat]"><p>{$c.met_footright}</p></if>
      </div>
      <if value="($ui[simok]&&$c[met_ch_lang]&&$data[lang] eq 'cn')||($c[met_lang_mark]&&$ui[langok])">
      <div class="foot-lang" m-type="lang" m-id="0">
        <if value="$ui[simok]&&$c[met_ch_lang]&&$data[lang] eq 'cn'">
        <a href="javascript:void(0);" class="simplified" title="设置页面显示为繁体中文">
          <i>繁</i>
        </a>
        </if>
        <if value="$c[met_lang_mark]&&$ui[langok]">
        <lang></lang>
        <if value="$sub gt 1">
        <lang>
        <if value="$data[lang] eq $v[mark]">
        <a href="javascript:void(0);" class="lang" data-toggle="modal" data-target="#met-langlist-modal">
          <if value="$ui[langqiok]"><i class="flag-icon flag-icon-{$v.iconname}"></i></if>
          <b>{$v.name}</b>
        </a>
        </if>
        </lang>
        </if>
        </if>
      </div>
      </if>
    </div>
    <div class="foot-right">
      <if value="$c[met_foottext]||$_GET[pageset]">
      <div class="foot-text" m-id="noset" m-type="head_seo">
        <if value="$c[met_foottext]">{$c.met_foottext}<else/><u>点击添加【网站底部优化字】内容（该文字仅“可视化”模式下可见）！</u></if>
      </div>
      </if>
      <div class="powered_by_metinfo">
      <!--  Powered by <a href="http://www.MetInfo.cn/#copyright" target="_blank" title="{$word.Info1}">MetInfo</a> {$c.metcms_v} -->	
      </div>
    </div>
  </div>
</footer>
<if value="$c[met_lang_mark]&&$ui[langok]">
<div class="modal fade modal-3d-flip-vertical" id="met-langlist-modal" aria-hidden="true" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        <div class="row">
          <lang>              
          <div class="col-md-4 col-sm-6 col-xs-12 lang-button">
            <a href="{$v.met_weburl}" class="btn btn-block btn-outline btn-default btn-squared text-nowrap" title="{$v.name}">
              <if value="$ui[langqiok]"><i class="flag-icon flag-icon-{$v.iconname}"></i></if>
              <b>{$v.name}</b>
            </a>
          </div>
          </lang>
        </div>
      </div>
    </div>
  </div>
</div>
</if>
</body>
</html>