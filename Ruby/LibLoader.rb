#
# LibLoader, gets the core and library
#
Dir[File.join(File.dirname(__FILE__), 'core', '*.rb')].each {|file| require file }
puts "CORE loaded"
Dir[File.join(File.dirname(__FILE__), 'lib', '*.rb')].each {|file| require file }
puts "LIB loaded"