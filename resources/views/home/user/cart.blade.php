@extends('layout.home')
@section('title','购物车')

@section('content')
	<div class=".container-fluid">
    <table id="cartTable col-md-8 col-md-offset-1">
        <thead>
        <tr>
            <th><label>
                <input class="check-all check" type="checkbox">&nbsp;&nbsp;全选</label></th>
            <th>商品</th>
            <th>单价</th>
            <th>数量</th>
            <th>小计</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr class="on">
            <td class="checkbox"><input class="check-one check" type="checkbox"></td>
            <td class="goods"><img src="" alt=""><span>Casio/卡西欧 EX-TR350</span></td>
            <td class="price">5999.88</td>
            <td class="count"><span class="reduce"></span>
                <input class="count-input" type="text" value="1">
                <span class="add">+</span></td>
            <td class="subtotal">5999.88</td>
            <td class="operation"><span class="delete">删除</span></td>
        </tr>
        <tr class="on">
            <td class="checkbox"><input class="check-one check" type="checkbox"></td>
            <td class="goods"><img src="" alt=""><span>Canon/佳能 PowerShot SX50 HS</span></td>
            <td class="price">3888.50</td>
            <td class="count"><span class="reduce"></span>
                <input class="count-input" type="text" value="1">
                <span class="add">+</span></td>
            <td class="subtotal">3888.50</td>
            <td class="operation"><span class="delete">删除</span></td>
        </tr>
        <tr class="on">
            <td class="checkbox"><input class="check-one check" type="checkbox"></td>
            <td class="goods"><img src="" alt=""><span>Sony/索尼 DSC-WX300</span></td>
            <td class="price">1428.50</td>
            <td class="count"><span class="reduce"></span>
                <input class="count-input" type="text" value="1">
                <span class="add">+</span></td>
            <td class="subtotal">1428.50</td>
            <td class="operation"><span class="delete">删除</span></td>
        </tr>
        <tr class="on">
            <td class="checkbox"><input class="check-one check" type="checkbox"></td>
            <td class="goods"><img src="" alt=""><span>Fujifilm/富士 instax mini 25</span></td>
            <td class="price">640.60</td>
            <td class="count"><span class="reduce"></span>
                <input class="count-input" type="text" value="1">
                <span class="add">+</span></td>
            <td class="subtotal">640.60</td>
            <td class="operation"><span class="delete">删除</span></td>
        </tr>
        </tbody>
    </table>
    <div class="foot" id="foot">
        <label class="fl select-all"><input type="checkbox" class="check-all check">&nbsp;&nbsp;全选</label>
        <a class="fl delete" id="deleteAll" href="javascript:;">删除</a>
        <div class="fr closing" onclick="getTotal();">结 算</div>
        <input type="hidden" id="cartTotalPrice">
        <div class="fr total">合计：￥<span id="priceTotal">11957.48</span></div>
        <div class="fr selected" id="selected">已选商品<span id="selectedTotal">4</span>件<span class="arrow up">︽</span><span class="arrow down">︾</span></div>
        <div class="selected-view">
            <div id="selectedViewList" class="clearfix"><div><img src="http://www.jq22.com/demo/jquery-guc20151105/images/1.jpg"><span class="del" index="0">取消选择</span></div><div><img src="http://www.jq22.com/demo/jquery-guc20151105/images/2.jpg"><span class="del" index="1">取消选择</span></div><div><img src="http://www.jq22.com/demo/jquery-guc20151105/images/3.jpg"><span class="del" index="2">取消选择</span></div><div><img src="http://www.jq22.com/demo/jquery-guc20151105/images/4.jpg"><span class="del" index="3">取消选择</span></div></div>
    </div>
</div>
@endsection

