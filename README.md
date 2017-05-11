# 分页组件

## 使用说明

用phalcon builder做个例子

1. 获取phalcon的模型管理器

$modelManager = new Manager();

2. 获取builder对象

$builder = $modelManager->createBuilder()->from("App\\Model\\User");

3. 获取分页数据

$pager = new Pager(new PhalconQueryBuilder($builder));

这样就拿到了分页数据对象

4. 获取数据

$result = $pager->getResults();

## 个性化

你可以自己实现IPagerAdapter接口。


