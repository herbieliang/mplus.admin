/**
 * 个人设置
 * User: Zachary Liang
 * Date: 16-11-28
 * Time: 下午5:04
 */

layui.use(['element', 'form', 'jquery', 'cropper', 'common'], function () {
    var element = layui.element(),
        form = layui.form(),
        layer = layui.layer,
        $ = layui.jquery
        common = layui.common;

    $(document).ready(function () {
        UploadAvatar();
    });

    function UploadAvatar() {
        var o = $(".img-crop > img");
        $(o).cropper({
            aspectRatio: 1/1, preview: ".img-preview", done: function () {
            }
        });
        var r = $("#inputImage");
        window.FileReader ? r.change(function () {
            var e, i = new FileReader, t = this.files;
            t.length && (e = t[0], /^image\/\w+$/.test(e.type) ? (i.readAsDataURL(e), i.onload = function () {
                r.val(""), o.cropper("reset", !0).cropper("replace", this.result)
            }) : showMessage('请上传图片！'))
        }) : r.addClass("hide"), $("#upload").click(function () {
            var loading = layer.msg('头像上传中，请稍侯。。。', {icon:16, time:false});
            common.ajax($(this).data('href'), 'post', 'json', {
                'avatar': o.cropper("getDataURL")
            }, function (res) {
                layer.close(loading);
                switch (res.code){
                    case '200':
                        common.alertSuccess(res.msg, null);
                        setTimeout(function () {
                            $("#avatar1",window.parent.document).attr('src',o.cropper("getDataURL"));
                            $("#avatar2",window.parent.document).attr('src',o.cropper("getDataURL"));
                        }, 2000);
                        break;
                    default:
                        common.alertError(res.msg, null);
                        break;
                }
            });
            $("#upload").removeAttr("disabled");
            $(this).text('确认保存');
        }), $("#zoomIn").click(function () {
            o.cropper("zoom", .1)
        }), $("#zoomOut").click(function () {
            o.cropper("zoom", -.1)
        }), $("#rotateLeft").click(function () {
            o.cropper("rotate", 90)
        }), $("#rotateRight").click(function () {
            o.cropper("rotate", -90)
        }), $("#setDrag").click(function () {
            o.cropper("setDragMode", "crop")
        })
    };

    form.verify({
        password: function(value){
            if($('input[name=password]').val() !== value){
                return '两次密码不一致！';
            }
        }
    });

    form.on('submit(formProfile)', function(data){
        var loading = layer.msg('数据提交中，请稍等。。。', {icon:16, time:false});
        common.ajax($('#formProfile').attr('action'), 'post', 'json', data.field, function (res) {
            layer.close(loading);
            switch (res.code){
                case '200':
                    common.alertSuccess(res.msg, null);
                    setTimeout(function () {
                        $("#nickname",window.parent.document).text(data.field['nickname']);
                    }, 2000);
                    break;
                default:
                    common.alertError(res.msg, null);
                    break;
            }
        });
        return false;
    });

    form.on('submit(formPassword)', function(data){
        var loading = layer.msg('数据提交中，请稍等。。。', {icon:16, time:false});
        common.ajax($('#formPassword').attr('action'), 'post', 'json', {
            'password': data.field['confirm-password']
        }, function (res) {
            layer.close(loading);
            switch (res.code){
                case '200':
                    common.alertSuccess(res.msg, null);
                    setTimeout(function () {
                        $('#formPassword')[0].reset();
                    }, 2000);
                    break;
                default:
                    common.alertError(res.msg, null);
                    break;
            }
        });
        return false;
    });
});