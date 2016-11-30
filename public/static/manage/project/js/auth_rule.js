/**
 * 权限节点js类库
 * User: Zachary Liang
 * Date: 16-11-27
 * Time: 上午10:54
 */

layui.use(['element', 'form', 'jquery', 'layer', 'common'], function () {
    var element = layui.element(),
        form = layui.form(),
        $ = layui.jquery,
        layer = layui.layer,
        common = layui.common;

    form.on('submit(formAuthRule)', function(data){
        var loading = layer.msg('数据提交中，请稍等。。。', {icon:16, time:false});
        common.ajax($('#formAuthRule').attr('action'), 'post', 'json', data.field, function (res) {
            layer.close(loading);
            switch (res.code){
                case '200':
                    common.alertSuccess(res.msg, null);
                    setTimeout(function () {
                        common.goUrl(res.url);
                    }, 2000);
                    break;
                default:
                    common.alertError(res.msg, null);
                    break;
            };
        });
        return false;
    });

    var active = {
        doAdd: function () {
            var url = $(this).data('href');
            common.goUrl(url);
        },
        doEdit: function(){
            var url = $(this).data('href');
            common.goUrl(url);
        },
        doDelete: function(){
            var url = $(this).data('href');
            var item = $(this).data('value');
            common.alertDel('确认删除这条信息？', '此操作不可逆，请再次确认是否要操作。', function () {
                common.ajax(url, 'post', 'json', {
                    'item': item
                }, function (res) {
                    switch (res.code){
                        case '200':
                            common.alertSuccess(res.msg, null);
                            setTimeout(function () {
                                common.goUrl(window.location.pathname);
                            }, 2000);
                            break;
                        default:
                            common.alertError(res.msg, null);
                            break;
                    }

                });
            })
        },
        doBatchDelete: function () {
            var url = $(this).data('href');
            common.alertDel('确认删除这些信息？', '此操作不可逆，请再次确认是否要操作。', function () {
                var items = '';
                $('.icheck').each(function (index, elem) {
                    if ($(elem).is(':checked')){
                        if ($(elem).data('value')){
                            items += $(elem).data('value') + ',';
                        }
                    };
                });
                common.ajax(url, 'post', 'json', {
                    'items': items
                }, function (res) {
                    switch (res.code) {
                        case '200':
                            common.alertSuccess(res.msg, null);
                            setTimeout(function () {
                                common.goUrl(window.location.pathname);
                            }, 2000);
                            break;
                        default:
                            common.alertError(res.msg, null);
                            break;
                    }
                });
            });
        },
        doGoBack: function () {
            var url = $(this).data('href');
            common.goUrl(url);
        }
    };

    $('.do-action').on('click', function(){
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });
});