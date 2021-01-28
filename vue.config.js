module.exports = {
    filenameHashing: false,
    publicPath: './',
    outputDir: 'build',
    chainWebpack: config => {
        config.plugins.delete('html');
        config.plugins.delete('preload');
        config.plugins.delete('prefetch');
    },
    devServer: {
        writeToDisk: true,
        hot: false,
    },
    productionSourceMap: false,
}