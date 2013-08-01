# Get core
require File.dirname(__FILE__) + '/LibLoader.rb'

class Fixnum
	alias_method :old_add, :+
	def +(arg1, arg2)
		arg1.old_add(arg2)
	end
end


def test(arg1, arg2)
	puts arg1 + arg2
end

+ "te", "st"