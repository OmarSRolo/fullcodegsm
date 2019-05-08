module.exports = {
  spec_dir: 'test/weex',
  spec_files: [
    '**/*[sS]pec.js1'
  ],
  helpers: [
    require.resolve('@babel/register')
  ]
}
